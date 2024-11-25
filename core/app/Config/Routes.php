<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Page::dashboard');
$routes->get('/Peserta', 'Page::peserta');

// Proses
$routes->get('/KonfirmasiKehadiran/(:num)/(:num)', 'Pemilih::konfirmasiKehadiran/$1/$2');
$routes->post('/TambahPemilih', 'Pemilih::tambahPemilih');
