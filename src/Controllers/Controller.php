<?php

namespace Chipaau\Controllers;

use Illuminate\Routing\Controller AS IlluminateController;
use Chipaau\Controllers\ControllerInterface;
use Chipaau\Repositories\Repository;

/**
* Base controller
*/
abstract class Controller extends IlluminateController implements ControllerInterface
{
    protected $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request, $id = null)
    {

    }

    public function show($resourceId, $childResourceId = null)
    {

    }

    public function store(Request $request, $resourceId = null)
    {

    }

    public function update(Request $request, $resourceId, $childResourceId = null)
    {

    }

    public function destroy($resourceId, $childResourceId = null)
    {
        
    }
}