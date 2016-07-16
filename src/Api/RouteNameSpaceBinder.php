<?php 

namespace Chipaau\Api;

use Illuminate\Routing\Route;
use Chipaau\Api\ApiVersion;

/**
* Route namespace binder
*/
class RouteNameSpaceBinder
{
    protected $versioning;

    public function __construct(ApiVersion $apiVersion)
    {
        $this->versioning = $apiVersion;
    }

    public function changeBindings(Route $route)
    {
        $action = $route->getAction();
        $action['namespace'] = $action['namespace'] . '\\' . $this->versioning->getVersion();
        $route->setAction($action);
    }

}