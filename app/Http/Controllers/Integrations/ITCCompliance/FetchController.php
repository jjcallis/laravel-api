<?php

namespace App\Http\Controllers\Integrations\ITCCompliance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Integrations\ITCCompliance\Providers\FetchProvider;

class FetchController extends Controller
{
    /** @var App\Integrations\ITCCompliance\Providers\FetchProvider */
    private $provider = null;

    /**
     * Create a new object instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->provider = app(FetchProvider::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list($entity)
    {
        if (!$this->validateEntity($entity)) {
            return response()->json([
                'message' => 'please provide a valid uri.'
            ], 400);
        }

        // if (!$this->provider->list($entity)) {
        //     return response()->json([
        //         'message' => 'Something went wrong with the request, please try again.'
        //     ], 400);
        // }

        return $this->provider->list($entity);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($entity, $id)
    {
        if (!$this->validateEntity($entity)) {
            return response()->json([
                'message' => 'please provide a valid uri.'
            ], 400);
        }
        return $this->provider
            ->show($entity, $id);
    }

    /**
     * Check if the entity is allowed
     *
     * @param  string  $entity
     * @return bool
     */
    public function validateEntity($entity)
    {
        return $this->provider
            ->getEntity($entity);
    }
}
