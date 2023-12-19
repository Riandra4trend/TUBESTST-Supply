<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index');
$routes->post('/login_action', 'LoginController::login_action');
$routes->get('pages/login', 'Pages::login');
$routes->get('pages/dashboard', 'Pages::dashboard');
$routes->get('pages/restock', 'Pages::restock');
$routes->get('pages/historyRestock', 'Pages::historyRestock');
$routes->get('pages/historyPurchase', 'Pages::historyPurchase');
$routes->get('pages/logout', 'LoginController::logout');
// File: app/Config/Routes.php

// $routes->post('/dashboard/updateStatus/(:any)/(:any)', 'Pages::updateStatus/$1/$2');
// $routes->post('updateStatus/(:any)/(:any)', 'Supply::confirm/$1/$2');