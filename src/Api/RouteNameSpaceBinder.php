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
        dd(get_class_methods($route));
        $action = $route->getAction();
        $namespace = $action['namespace'];
        $newNameSpace = $namespace . '\\' . $this->versioning->getVersion();
        $newAction = array_merge($action, [
            'namespace' => $newNameSpace,
            'uses' => str_replace($namespace, $newNameSpace, $action['uses']),
            'controller' => str_replace($namespace, $newNameSpace, $action['uses'])
        ]);
        $route->setAction($newAction);
    }

}