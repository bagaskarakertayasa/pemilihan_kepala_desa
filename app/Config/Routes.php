<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->setAutoRoute(true);
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

// routes untuk autentikasi
$routes->get('login', 'autentikasi::login_page');
$routes->post('proses_login', 'autentikasi::login');
$routes->get('keluar', 'autentikasi::keluar');

// routes untuk dashboard
$routes->get('dashboard', 'Home::dashboard');

// routes untuk fitur calon perbekel
$routes->get('calon_perbekel/(:any)', 'admin_desa::calon/$1');
$routes->post('proses_tambah_calon', 'admin_desa::proses_tambah_calon');
$routes->get('input_ulang/(:any)', 'admin_desa::input_ulang/$1');

// routes untuk fitur TPS desa
$routes->get('tps/(:any)', 'admin_desa::tabel_tps/$1');
$routes->post('proses_tambah_tps', 'admin_desa::proses_tambah_tps');
$routes->post('edit_data_tps', 'admin_desa::edit_data_tps');
$routes->get('hapus_tps/(:any)', 'admin_desa::hapus_tps/$1');

// routes untuk admin fitur akun
$routes->get('akun', 'admin_pusat::tabel_akun');
$routes->post('tambah_data_akun', 'admin_pusat::tambah_data_akun');
$routes->post('edit_data_akun', 'admin_pusat::edit_data_akun');
$routes->post('ubah_password', 'admin_pusat::ubah_password');
$routes->get('ubah_status/(:any)', 'admin_pusat::ubah_status/$1');

// routes untuk fitur tps di admin pusat
$routes->get('daftar_tps', 'admin_pusat::daftar_tps');
$routes->post('filter_tps', 'admin_pusat::filter_tps');


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
