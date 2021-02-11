<?php

namespace App\Integrations\ITCCompliance\Responses;

class ProductResponse
{
    /**
     * Format the  fields.
     *
     * @param  array  $response
     * @return array
     */
    public function formatResponse($response)
    {
        return collect($response ?? null);
    }
}
