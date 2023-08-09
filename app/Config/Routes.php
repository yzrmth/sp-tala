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

$routes->group('', ['filter' => 'role:Admin, Petugas Pemetaan'], static function ($routes) {
    $routes->presenter('dashboard', ['controller' => 'Dashboard']);
});

// $routes->presenter('dashboard', ['controller' => 'Dashboard']);
$routes->presenter('penyimpanan-peta', ['controller' => 'Peta'], ['filter' => 'role:Admin, Petugas Pemetaan']);
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
$routes->get('api-digitasi-terdudukan', 'API\Digitasi::DigitasiTerdudukan');
$routes->get('digitasi-terdudukan', 'Digitasi::DaftarTerdudukan');
$routes->post('digitasi-hapus/(:num)/(:num)', 'Peta::delete_digitasi/$1/$2');

// Routes Riwayat
$routes->get('api-riwayat/(:num)', 'Riwayat::getRiwayat/$1');

// Routes Scan Peta (image)
$routes->get('scan-uploaded', 'Dashboard::scan_peta_dashboard');
$routes->get('api-scan-uploaded', 'Dashboard::dataScanPeta');

// custom routes penyimpanan peta
$routes->get('data-peta', 'Peta::dataPeta');
$routes->get('scan-peta-download/(:num)/(:num)', 'Peta::do_download/$1/$2');

$routes->get('digitasi-download/(:num)/(:num)', 'Peta::do_download_digitasi/$1/$2');
$routes->post('data-peta/image-delete/(:num)', 'Peta::delete_image/$1');
$routes->post('penyimpanan-peta/upload/(:num)', 'Peta::upload_image/$1');
$routes->post('penyimpanan-peta/upload-digitasi/(:num)', 'Peta::upload_digitasi/$1');

//  custome routes dokumen
$routes->presenter('dokumen', ['controller' => 'dokumen'], ['filter' => 'role:Admin']);
$routes->post('dokumen/add', 'Dokumen::add_dokumen');
$routes->post('jenis-dokumen/add', 'Dokumen::add_jenis_dokumen');

// Routes Pengguna - Admin
$routes->group('', ['filter' => 'role:Admin'], static function ($routes) {
    $routes->presenter('akun', ['controller' => 'Admin\Akun']);
    $routes->get('pengaturan-akun/(:segment)', 'Admin\Akun::show/$1');
    $routes->post('update-profil-akun/(:segment)', 'Admin\Akun::edit_profil_pengguna/$1');
    $routes->post('hapus-akses/(:segment)/(:segment)', 'Admin\Akun::hapus_akses/$1/$2');
    $routes->post('tambah-akses', 'Admin\Akun::tambah_akses');
    $routes->post('nonaktif-akun/(:segment)', 'Admin\Akun::nonaktif_akun/$1');
    $routes->post('aktif-akun/(:segment)', 'Admin\Akun::aktif_akun/$1');
});

// Routes Pengguna
$routes->group('', static function ($routes) {
    $routes->presenter('pengguna', ['controller' => 'Pengguna']);
});


$routes->get('data-pengguna', 'Pengguna::dataPengguna');
$routes->get('data-profil', 'Pengguna::dataProfil');


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
