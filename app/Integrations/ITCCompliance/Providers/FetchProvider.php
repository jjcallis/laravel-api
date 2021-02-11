<?php

namespace App\Integrations\ITCCompliance\Providers;

use App\Integrations\Contracts\ProviderInterface;
use App\Integrations\ITCCompliance\Entities\Product;

class FetchProvider implements ProviderInterface
{
    /** * @var array */
    private $entity = [
        'product' => Product::class,
    ];

    /**
     * Get the identifier for the provider.
     *
     * @return string
     */
    public function getIdentifier()
    {
        return 'itc-compliance';
    }

    /**
     * List all the available data.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return \App\Integrations\Contracts\EntityInterface
     */
    public function list($model)
    {
        return app($this->getEntity($model))
            ->list();
    }

    /**
     * Show the product details.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  int  $id
     * @return \App\Integrations\Contracts\EntityInterface
     */
    public function show($model, $id)
    {
        return app($this->getEntity($model))
            ->show($id);
    }


    /**
     * Get the appropriate entity for the model.
     *
     * @param  mixed  $model
     * @return \App\Integrations\Contracts\EntityInterface
     */
    public function getEntity($model)
    {
        return $this->entity[$model] ?? null;
    }
}
