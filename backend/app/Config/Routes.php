<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->resource('Products');
$routes->resource('Users');
$routes->post('/login', 'Users::authenticate');