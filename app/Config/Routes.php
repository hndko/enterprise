<?php

namespace Config;

use App\Controllers\BahanController;
use App\Controllers\MitraController;
use App\Controllers\ProdukController;

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
$routes->get('/', 'Home::index'); //INI LOGIN
$routes->get('/logout', 'Home::logout'); //INI LOGIN

$routes->get('/dashboard', 'Dashboard::index'); //INI DASHBOARD

$routes->get('bos/penjualan/graphic/1hari', 'Bos::penjualangraphic_1hari');
$routes->get('bos/penjualan/graphic/7hari', 'Bos::penjualangraphic_7hari');
$routes->get('bos/penjualan/graphic/90hari', 'Bos::penjualangraphic_90hari');
$routes->get('bos/penjualan/graphic/tahunan', 'Bos::penjualangraphic_tahunan');

/** Route Produk */
$routes->get('produk', [ProdukController::class, 'index']);
$routes->get('produk/create', [ProdukController::class, 'create']);
$routes->post('produk/store', [ProdukController::class, 'store']);
$routes->get('produk/detail/(:num)', [ProdukController::class, 'show/$1']);
$routes->get('produk/edit/(:num)', [ProdukController::class, 'edit/$1']);
$routes->post('produk/update', [ProdukController::class, 'update']);

/** Route Mitra */
$routes->get('mitra', [MitraController::class, 'index']);
$routes->get('mitra/create', [MitraController::class, 'create']);
$routes->post('mitra/store', [MitraController::class, 'store']);
$routes->get('mitra/edit/(:num)', [MitraController::class, 'edit/$1']);
$routes->post('mitra/update', [MitraController::class, 'update']);

/** Route Bahan */
$routes->get('bahan', [BahanController::class, 'index']);
$routes->get('bahan/create', [BahanController::class, 'create']);
$routes->post('bahan/store', [BahanController::class, 'store']);
$routes->get('bahan/edit/(:num)', [BahanController::class, 'edit/$1']);
$routes->post('bahan/update', [BahanController::class, 'update']);

// BOSSS
$routes->get('/penjahit', 'Bos::penjahit');
$routes->get('/penjahit/createpenjahit', 'Bos::createPenjahit');
$routes->post('/penjahit/storepenjahit', 'Bos::storePenjahit');
$routes->get('/penjahit/editpenjahit/(:num)', 'Bos::editPenjahit/$1');
$routes->post('/penjahit/updatepenjahit', 'Bos::updatePenjahit');
// penjualan
$routes->get('/penjualan/detailpenjualan/(:num)', 'Penjualan::detailPenjualan/$1');
// penjahitan
$routes->get('/produksi/detailpenjahitan/(:num)', 'Produksi::detailPenjahitan/$1');
$routes->get('/produksi/tambahproduksi', 'Produksi::tambahProduksi');
$routes->post('/produksi/storeproduksi', 'Produksi::storeProduksi');
// $routes->get('/tampol', 'Sales::penjualan');

$routes->get('/penjualan/tambahpenjualan', 'Penjualan::tambahPenjualan');
$routes->post('/penjualan/storepenjualan', 'Penjualan::storePenjualan');


// coba
$routes->get('transaksi', 'TransaksiController::index');
$routes->post('transaksi/simpan', 'TransaksiController::simpan');




// CHAT
$routes->get('/chat', 'ChatController::index');
$routes->get('/chatAll', 'ChatController::indexAll');
$routes->post('/chat/sendMessage', 'ChatController::sendMessage');
$routes->post('/chatAll/sendMessage', 'ChatController::sendAllMessage');


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
