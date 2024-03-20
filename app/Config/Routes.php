<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/bill-of-materials', 'ApiDataController::getBOMs');

$routes->get('/regist-bom', 'Pages::bomForm');

$routes->post('/regist-bom-api', 'ApiDataController::postComponent');


