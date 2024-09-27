<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'admin::index');
$routes->get('/', 'AuthController::loginAdminChef');
$routes->post('/auth/loginAdminChef', 'AuthController::loginAdminChef');
$routes->get('/auth/loginCustomer', 'AuthController::loginCustomer');
$routes->post('/auth/loginCustomer', 'AuthController::loginCustomer');
$routes->get('/auth/logout', 'AuthController::logout');
$routes->get('/kategori_menu', 'KategoriMenuController::index');
// $routes->get('/kategori_menu/create', 'KategoriMenuController::create', ['filter' => 'auth']);
// $routes->post('/kategori_menu/create', 'KategoriMenuController::create', ['filter' => 'auth']);
// $routes->get('/kategori_menu/edit/(:num)', 'KategoriMenuController::edit/$1', ['filter' => 'auth']);
// $routes->post('/kategori_menu/edit/(:num)', 'KategoriMenuController::edit/$1', ['filter' => 'auth']);
// $routes->get('/kategori_menu/delete/(:num)', 'KategoriMenuController::delete/$1', ['filter' => 'auth']);
