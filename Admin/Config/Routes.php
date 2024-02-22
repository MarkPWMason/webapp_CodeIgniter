<?php 

namespace Admin\Config;

use Config\Services;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

$routes->group("admin", ["namespace" => "Admin\Controllers", "filter" => "session"], static function ($routes){

$routes->get("users", "Users::index");
$routes->get("users/(:num)", "Users::show/$1");
$routes->post("users/(:num)/toggle-ban", "Users::toggleBan/$1"); 

});