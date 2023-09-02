<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->group('/', ['filter' => 'auth'], function ($routes) {
    $routes->get('admin', 'admin::index');
    $routes->get('vehicle', 'kendaraan::index');
    $routes->get('driver', 'driver::index');

    $routes->get('pemesanan', 'pemesanan::index');
    $routes->post('pemesanan/tambah', 'pemesanan::tambah');

    $routes->get('transaksi', 'transaksi::index');
    $routes->get('transaksi/cetak', 'transaksi::cetak');

    $routes->get('agreement', 'Agreement::index');
});

$routes->get('/login', 'Login::index');
$routes->post('/login/auth', 'Login::auth');

$routes->get('/logout', 'Login::logout');
