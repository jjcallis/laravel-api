<?php

namespace App\Integrations\ITCCompliance\Requests;

use Illuminate\Support\Facades\Http;
use App\Integrations\ITCCompliance\Responses\ProductResponse;
use App\Integrations\ITCCompliance\Responses\ProductsResponse;

class ProductRequest
{
    /**
     * Set all the enpoints
     *
     * @var array
     */
    protected $endpoints = [
        'list' => 'https://www.itccompliance.co.uk/recruitment-webservice/api/list',
        'show' => 'https://www.itccompliance.co.uk/recruitment-webservice/api/info?id=%s'
    ];

    /**
     * List all the products.
     *
     * @return \App\Integrations\Abstracts\Response
     */
    public function list()
    {
        $response = Http::get($this->endpoints['list'])->json();

        // Invoke call on failed request.
        if (isset($response['error'])) {
            return $this->list();
        }

        return app(ProductsResponse::class)
               ->formatResponse($response);
    }

    /**
     * Get the product the by given id.
     *
     * @param  int  $productID
     * @return \App\Integrations\Abstracts\Response
     */
    public function byId($productID)
    {
        $response = Http::get(sprintf($this->endpoints['show'], $productID))->json();

        // Invoke call on failed request.
        if (isset($response['error'])) {
            return $this->byId($productID);
        }

        return  app(ProductResponse::class)
               ->formatResponse($response);
    }
}
