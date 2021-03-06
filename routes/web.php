<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/',[SiteController::class, 'home']);
Route::post('/register',[SiteController::class, 'register']);
Route::get('/about',[SiteController::class, 'about']);



// Login
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin']);
Route::get('/logout', [AuthController::class, 'logout']);


// MANAJEMENT ROUTE SISWA

Route::group(['middleware' => ['auth','checkRole:admin']], function(){
    Route::get('/siswa', [SiswaController::class, 'index']);
    Route::post('/siswa/create', [SiswaController::class, 'create']);
    Route::get('/siswa/{siswa}/edit', [SiswaController::class, 'edit']);
    Route::post('/siswa/{siswa}/update', [SiswaController::class, 'update']);
    Route::get('/siswa/{siswa}/delete', [SiswaController::class, 'destroy']);
    Route::get('/siswa/{siswa}/profile', [SiswaController::class, 'profile']);
    Route::post('/siswa/{id}/addnilai', [SiswaController::class, 'addnilai']);
    Route::get('/siswa/{id}/{idmapel}/deletenilai', [SiswaController::class, 'deletenilai']);
    Route::get('/siswa/exportExcel',[SiswaController::class, 'exportExcel']);
    Route::get('/siswa/exportpdf',[SiswaController::class, 'exportpdf']);
    Route::get('/guru/{id}/profile',[GuruController::class, 'profile']);

});

// Level Admin dan siswa

Route::group(['middleware' => ['auth','checkRole:admin,siswa']], function(){
// DAshboard
Route::get('/dashboard', [DashboardController::class, 'index']);

});

