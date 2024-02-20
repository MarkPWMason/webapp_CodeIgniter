<?php 

namespace Admin\Config;

use Config\Services;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

$routes->get("admin/users", "\Admin\Controllers\Users::index");
$routes->get("admin/users/(:num)", "\Admin\Controllers\Users::show/$1");