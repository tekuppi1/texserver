<?php
use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::defaultRouteClass(DashedRoute::class);
Router::extensions('json');
Router::scope('/', function (RouteBuilder $routes) {
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);
    $routes->connect('/admin/*', ['controller' => 'Admin', 'action' => 'index']);
    $routes->fallbacks('DashedRoute');
});
Plugin::routes();
