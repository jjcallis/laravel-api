<?php

namespace App\Integrations\ITCCompliance\Responses;

class ProductsResponse
{
    /**
     * Format the  fields.
     *
     * @param  array  $response
     * @return array
     */
    public function formatResponse($response)
    {
        return collect($response['products'] ?? null);
    }
}
