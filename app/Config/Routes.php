<?php

use CodeIgniter\Router\RouteCollection;

use App\Controllers\Cattable;
use App\Controllers\Pages;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('cattable', 'Cattable::index');//read
// $routes->get('cattable/new', [Cattable::class, 'new']); // create problematisch
// $routes->post('cattable', [Cattable::class, 'create']); //create problematisch
$routes->get('cattable/new', 'Cattable::new'); //create
$routes->post('cattable/create', 'Cattable::create'); //create


$routes->get('cattable/showCreate', 'Cattable::showCreate'); //to showview create2
$routes->get('cattable/edit/(:segment)', 'Cattable::edit/$1');//edit/update
$routes->post('cattable/edit/(:segment)', 'Cattable::edit/$1');//edit/update
// $routes->post('cattable/update', 'Cattable::update'); //update

// $routes->get('cattable/delete', 'Cattable::delete');//gang ganz falsch -->post
$routes->post('cattable/delete/(:segment)', 'Cattable::delete/$1');//delete

//$routes->get('cattable/update/(:segment)', 'Cattable::update/$1');//update (functionallity not confirmed yet)
$routes->post('cattable/update/(:segment)', 'Cattable::update/$1');//
// $routes->get('cattable/(:segment)', 'Cattable::showcats/$1');//read

// $routes->get('pages', [Pages::class, 'index']);
// $routes->get('(:segment)', [Pages::class, 'view']);

$routes->get('pages', 'Pages::index');
$routes->get('(:segment)', 'Pages::view'); //Anfängerfreundlicher

$routes->get('upload', 'Upload::index'); //für den Bilderupload in cattable
$routes->post('upload/store', 'Upload::store');
$routes->get('cattable/managePortraitpath/(:segment)', 'Cattable::managePortraitpath/$1');
