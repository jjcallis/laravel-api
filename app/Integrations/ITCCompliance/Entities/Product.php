<?php

namespace App\Integrations\ITCCompliance\Entities;

use App\Integrations\ITCCompliance\Requests\ProductRequest;

class Product
{
    /**
     * List all of the products.
     *
     * @return \App\Integrations\Contracts\EntityInterface
     */
    public function list()
    {
        return app(ProductRequest::class)
            ->list();
    }

    /**
     * Show the product by the given id.
     *
     * @param  string  $id
     * @return \App\Integrations\Contracts\EntityInterface
     */
    public function show($id)
    {
        return app(ProductRequest::class)
            ->byId($id);
    }
}
