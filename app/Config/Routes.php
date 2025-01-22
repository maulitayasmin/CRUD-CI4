<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('users', function($routes) {
    $routes->get('', 'UserController::index');          // Menampilkan daftar data (read)
    $routes->get('create', 'UserController::create');   // Menampilkan form tambah data (create)
    $routes->post('store', 'UserController::store');    // Proses menyimpan data baru
    $routes->get('edit/(:any)', 'UserController::edit/$1'); // Menampilkan form edit data
    $routes->post('update/(:any)', 'UserController::update/$1'); // Proses update data
    $routes->get('delete/(:any)', 'UserController::delete/$1'); // Proses hapus data
    $routes->get('view/(:any)', 'UserController::view/$1');

});

$routes->group('kelas', function ($routes) {
    $routes->get('', 'KelasController::index');           // Menampilkan daftar kelas
    $routes->get('create', 'KelasController::create');     // Menampilkan form tambah kelas
    $routes->post('store', 'KelasController::store');      // Menyimpan data kelas baru
    $routes->get('edit/(:any)', 'KelasController::edit/$1'); // Menampilkan form edit kelas
    $routes->post('update/(:any)', 'KelasController::update/$1'); // Memperbarui data kelas
    $routes->get('delete/(:any)', 'KelasController::delete/$1');  // Menghapus data kelas
});



