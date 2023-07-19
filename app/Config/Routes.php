<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');


$routes->presenter('dashboard', ['controller' => 'Dashboard']);
$routes->presenter('penyimpanan-peta', ['controller' => 'Peta']);
$routes->presenter('digitasi', ['controller' => 'Digitasi']);

$routes->resource('api-peta', ['placeholder' => '(:num)']);
$routes->get('api-peta/(:num)/detil', 'Peta::detilPeta/$1');
$routes->get('api-peta/(:num)/peta-image', 'Peta::image_preview/$1');

// API dokumen controller
$routes->get('data-dokumen', 'Dokumen::dataDokumen');
$routes->get('dokumen/(:num)/detil', 'Dokumen::get_dokumen/$1');
$routes->get('jenis-dokumen', 'Dokumen::jenis_dokumen');

// Routes Digitasi
$routes->get('api-digitasi', 'Digitasi::index');



// custom routes penyimpanan peta
$routes->get('data-peta', 'Peta::dataPeta');
$routes->get('data-peta/download/(:num)', 'Peta::do_download/$1');
$routes->get('data-peta/download-digitasi/(:num)', 'Peta::do_download_digitasi/$1');
$routes->post('data-peta/image-delete/(:num)', 'Peta::delete_image/$1');
$routes->post('penyimpanan-peta/upload/(:num)', 'Peta::upload_image/$1');
$routes->post('penyimpanan-peta/upload-digitasi/(:num)', 'Peta::upload_digitasi/$1');

//  custome routes dokumen
$routes->presenter('dokumen', ['controller' => 'dokumen']);
$routes->post('dokumen/add', 'Dokumen::add_dokumen');
$routes->post('jenis-dokumen/add', 'Dokumen::add_jenis_dokumen');




// Route untuk merender gambar Peta
$routes->match(['get', 'post'], 'imageRender/(:segment)', 'Peta::renderImage/$1');
$routes->match(['get', 'post'], 'pdfRender/(:segment)', 'Dokumen::render_pdf/$1');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
