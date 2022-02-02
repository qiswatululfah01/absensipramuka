<?php

use App\Http\Controllers\KelasController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', 'HomeController@index');

Auth::routes(['verify' => true]);

//Auth Admin
Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/', [App\Http\Controllers\DashboardController::class, 'index']);
    });

//Kelas
Route::get('/kelas', 'KelasController@index');
Route::post('/kelas/store', 'KelasController@store');
Route::patch('/kelas/{id}', 'KelasController@update');
Route::delete('/kelas/{id}', 'KelasController@destroy');

//Semester
Route::get('/semester', 'SemesterController@index');
Route::post('/semester/store', 'SemesterController@store');
Route::patch('/semester/{id}', 'SemesterController@update');
Route::delete('/semester/{id}', 'SemesterController@destroy');


//Tahun Pelajaran
Route::get('/tapel', 'TapelController@index');

//Jabatan
Route::get('/jabatan', 'JabatanController@index');
Route::post('/jabatan/store', 'JabatanController@store');
Route::patch('/jabatan/{id}', 'JabatanController@update');
Route::delete('/jabatan/{id}', 'JabatanController@destroy');


//Jadwal
Route::get('/jadwal', 'JadwalController@index');
// Route::post('/jabatan/store', 'JabatanController@store');
// Route::patch('/jabatan/{id}', 'JabatanController@update');
// Route::delete('/jabatan/{id}', 'JabatanController@destroy');


//Berita
Route::get('/berita', 'BeritaController@index');
// Route::post('/jabatan/store', 'JabatanController@store');
// Route::patch('/jabatan/{id}', 'JabatanController@update');
// Route::delete('/jabatan/{id}', 'JabatanController@destroy');

//Presensi
Route::get('/presensi', 'PresensiController@index');
// Route::post('/jabatan/store', 'JabatanController@store');
// Route::patch('/jabatan/{id}', 'JabatanController@update');
// Route::delete('/jabatan/{id}', 'JabatanController@destroy');

//Dpembina
Route::get('/dpembina', 'DpembinaController@index');
// Route::post('/jabatan/store', 'JabatanController@store');
// Route::patch('/jabatan/{id}', 'JabatanController@update');
// Route::delete('/jabatan/{id}', 'JabatanController@destroy');

//Dadmin
Route::get('/dadmin', 'DadminController@index');
// Route::post('/jabatan/store', 'JabatanController@store');
// Route::patch('/jabatan/{id}', 'JabatanController@update');
// Route::delete('/jabatan/{id}', 'JabatanController@destroy');

//Dsiswa
Route::get('/dsiswa', 'DsiswaController@index');
// Route::post('/jabatan/store', 'JabatanController@store');
// Route::patch('/jabatan/{id}', 'JabatanController@update');
// Route::delete('/jabatan/{id}', 'JabatanController@destroy');


//Auth User
Route::get('/user', [App\Http\Controllers\User\DashboardController::class, 'index'])
    ->name('user.dashboard')
    ->middleware(['auth']);

// API
Route::prefix('api')->group(function () {
    Route::get('next-kelas', [KelasController::class, 'nextKelas']);
    Route::get('all-kelas', [KelasController::class, 'allKelas']);
    Route::get('next-semester', [SemesterController::class, 'nextSemester']);
    Route::get('all-semester', [SemesterController::class,'allSemester']);
    Route::get('next-jabatan', [JabatanController::class, 'nextJabatan']);
    Route::get('all-jabatan', [JabatanController::class, 'allJabatan']);
});

Route::get('/logout', 'Auth\LoginController@logout');



