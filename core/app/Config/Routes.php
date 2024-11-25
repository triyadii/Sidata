<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Page::login');
$routes->get('/Dashboard', 'Page::dashboard');
$routes->get('/Peserta', 'Page::peserta');
$routes->get('/Pengguna', 'Page::pengguna');

// Proses
$routes->get('/KonfirmasiKehadiran/(:num)/(:num)', 'Pemilih::konfirmasiKehadiran/$1/$2');
$routes->post('/TambahPemilih', 'Pemilih::tambahPemilih');
$routes->post('/TambahUser', 'User::create');
$routes->get('/HapusUser/(:num)', 'User::hapus/$1');
$routes->post('/Login', 'User::login');
$routes->get('/Keluar', 'User::keluar');
