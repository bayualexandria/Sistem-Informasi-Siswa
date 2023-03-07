<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('AuthenticationController');
$routes->setDefaultMethod('login');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');

// Backend
$routes->get('/auth-admin', 'AuthenticationController::admin');
$routes->post('/auth-admin', 'AuthenticationController::attemptAdmin');
$routes->post('/logout-admin', 'AuthenticationController::logoutAdmin');

$routes->group('', ['filter' => 'admin'], function ($routes) {
    $routes->get('/dashboard', 'Backend\DashboardController::index');
    $routes->get('/profile', 'Backend\DashboardController::profile');
    $routes->put('/profile', 'Backend\DashboardController::updateProfile');
    $routes->group('', ['filter' => ['wali-kelas', 'role-admin']], function ($routes) {
        $routes->post('/kelas', 'Backend\KelasController::insert');
    });

    // Access Admin
    $routes->group('', ['filter' => 'role-admin'], function ($routes) {

        $routes->put('/profile-admin', 'Backend\DashboardController::profileAdmin');

        // CRUD Data Guru
        $routes->group('guru', function ($routes) {
            $routes->get('/', 'Backend\GuruController::index');
            $routes->put('updateuser/(:any)', 'Backend\GuruController::updateUser/$1');
            $routes->post('adduser/(:any)', 'Backend\GuruController::addUser/$1');
            $routes->put('(:any)', 'Backend\GuruController::update/$1');
            $routes->post('/', 'Backend\GuruController::insert');
            $routes->delete('(:any)', 'Backend\GuruController::delete/$1');
        });

        // CRUD Data Mapel
        $routes->group('mata-pelajaran', function ($routes) {
            $routes->get('/', 'Backend\MapelController::index');
            // $routes->get('detail/(:any)', 'Backend\MapelController::detail/$1');
            $routes->put('(:any)', 'Backend\MapelController::update/$1');
            $routes->post('/', 'Backend\MapelController::insert');
            $routes->delete('(:any)', 'Backend\MapelController::delete/$1');
        });

        // CRUD Data Kelas
        $routes->group('kelas', function ($routes) {
            $routes->get('/', 'Backend\KelasController::index');
            $routes->get('siswa/(:any)', 'Backend\KelasController::kelasSiswa/$1');
            $routes->put('siswa/delete/(:any)', 'Backend\KelasController::deleteKelasSiswa/$1');
            $routes->put('siswa/(:any)', 'Backend\KelasController::updateKelasSiswa/$1');
            $routes->put('(:any)', 'Backend\KelasController::update/$1');
            $routes->post('/', 'Backend\KelasController::insert');
            $routes->delete('(:any)', 'Backend\KelasController::delete/$1');
        });

        // CRUD Data Semester
        $routes->group('semester', function ($routes) {
            $routes->post('/', 'Backend\SemesterController::insert');
            $routes->post('/(:any)', 'Backend\SemesterController::update/$1');
        });
    });

    // Access Wali Kelas
    $routes->group('', ['filter' => 'wali-kelas'], function ($routes) {
        // Detail data Kelas
        $routes->get('/siswa/wali-kelas/(:any)', 'Backend\KelasController::kelasSiswa/$1');
        $routes->put('/kelas-siswa-delete/(:any)', 'Backend\KelasController::deleteKelasSiswa/$1');

    });
    // Detail mata pelajaran
    $routes->get('mata-pelajaran/detail/(:any)', 'Backend\MapelController::detail/$1');
    
    // CRUD Nilai Mapel Siswa

    $routes->group('nilai-mapel-siswa', function ($routes) {
        $routes->post('(:any)', 'Backend\MapelController::insertNilaiMapelSiswa/$1');
        $routes->put('(:any)', 'Backend\MapelController::updateNilaiMapelSiswa/$1');
    });
    // CRUD Nilai Rata Rata
    $routes->group('nilai-rata-rata', function ($routes) {
        $routes->post('(:any)', 'Backend\MapelController::insertNilaiRataRata/$1');
        $routes->put('(:any)', 'Backend\MapelController::updateNilaiRataRata/$1');
    });

    // Access Admin And Wali Kelas

    // Read and Detail Mapel by Guru
    $routes->get('/mapel/(:any)', 'Backend\MapelController::mapelByGuru/$1');
    $routes->get('/mata-pelajaran/detail/(:any)', 'Backend\MapelController::detail/$1');


    // CRUD Data Siswa
    $routes->group('siswa', function ($routes) {
        $routes->get('/', 'Backend\SiswaController::index');
        $routes->put('updateuser/(:any)', 'Backend\SiswaController::updateUser/$1');
        $routes->post('adduser/(:any)', 'Backend\SiswaController::addUser/$1');
        $routes->put('(:any)', 'Backend\SiswaController::update/$1');
        $routes->post('/', 'Backend\SiswaController::insert');
        $routes->delete('(:any)', 'Backend\SiswaController::delete/$1');
    });

    $routes->get('/laporan-data-kelas-siswa/(:any)', 'Backend\LaporanController::laporanDataKelasSiswa/$1');
    $routes->get('/laporan-data-jadwal-mapel/(:any)', 'Backend\LaporanController::laporanDataMapelKelas/$1');
    $routes->get('/laporan-data-nilai-siswa/(:any)', 'Backend\LaporanController::laporanDataNilaiSiswa/$1');
});

// Rest Full API
// Back-end
$routes->group('', ['filter' => 'admin'], function ($routes) {
    $routes->get('/api/search/siswa', 'Api\SiswaController::searchSiswa');
    $routes->put('/api/update/siswa/(:any)', 'Api\SiswaController::updateSiswa/$1');
    $routes->post('/api/auth', 'Api\Authentication::login');
});


// Rest Full API
// Front-end
$routes->group('api', function ($routes) {
    $routes->post('login', 'Api\Authentication::login');
    $routes->group('', ['filter' => 'auth'], function ($routes) {

        // User
        $routes->get('user/(:any)', 'Api\UserController::index/$1');
        $routes->post('user/(:any)', 'Api\UserController::updateUser/$1');

        // Mapel
        $routes->get('mapel/(:any)', 'Api\MapelController::index/$1');
    });
});
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
