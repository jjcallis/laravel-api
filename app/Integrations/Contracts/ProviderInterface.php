<?php

namespace App\Integrations\Contracts;

interface ProviderInterface
{
    /**
     * Get the identifier for the provider.
     *
     * @return string
     */
    public function getIdentifier();
}
