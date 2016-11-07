<?php
namespace App;

use Cake\Core\Configure;
use Cake\Error\Middleware\ErrorHandlerMiddleware;
use Cake\Http\BaseApplication;
use Cake\Routing\Middleware\AssetMiddleware;
use Cake\Routing\Middleware\RoutingMiddleware;

class Application extends BaseApplication {

    public function middleware($middleware)
    {
        $middleware
            ->add(new ErrorHandlerMiddleware(Configure::read('Error.exceptionRenderer')))
            ->add(new AssetMiddleware())
            ->add(new RoutingMiddleware());
        return $middleware;
    }
}
