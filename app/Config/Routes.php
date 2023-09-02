<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->group('/', ['filter' => 'auth'], function ($routes) {
    $routes->get('admin', 'admin::index');
    $routes->get('vehicle', 'kendaraan::index');

    $routes->get('agreement', 'Agreement::index');
});

$routes->get('/login', 'Login::index');
$routes->post('/login/auth', 'Login::auth');

$routes->get('/logout', 'Login::logout');
