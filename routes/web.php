<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KabupatenController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ObjekWisataController;
use App\Http\Controllers\UserController;

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

Route::get('/Register', [LoginController::class, 'register'])->name('register');
Route::post('/SessionRegister', [LoginController::class, 'postregister'])->name('on-register');
Route::get('/Home', [HomeController::class, 'index'])->name('home');

//Admin
Route::get('/LoginUser', [LoginController::class, 'postlogin'])->name('login');
Route::post('/SessionLogin', [LoginController::class, 'loginsession'])->name('loginsession');
Route::get('/Logout', [LoginController::class, 'logout'])->name('logout');
Route::group(['middleware' =>['auth', 'ceklevel:admin']], function () {
    Route::get('/Dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

//User
Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' =>['auth', 'ceklevel:user']], function () {
    Route::get('/Home', [HomeController::class, 'index'])->name('home');
});

//Kabupaten
Route::get('/Kabupaten', [KabupatenController::class, 'index'])->name('kabupaten');
Route::get('/Kabupaten/Add', [KabupatenController::class, 'create'])->name('add-kabupaten');
Route::post('/Kabupaten/Insert', [KabupatenController::class, 'insert'])->name('insert-kabupaten');
Route::get('/Kabupaten/Edit/{id}', [KabupatenController::class, 'edit'])->name('edit-kabupaten');
Route::post('/Kabupaten/Update/{id}', [KabupatenController::class, 'update'])->name('update-kabupaten');
Route::get('/Kabupaten/Delete/{id}', [KabupatenController::class, 'delete'])->name('delete-kabupaten');

//Kategori
Route::get('/Kategori', [KategoriController::class, 'index'])->name('kategori');
Route::get('/Kategori/Add', [KategoriController::class, 'create'])->name('add-kategori');
Route::post('/Kategori/Insert', [KategoriController::class, 'insert'])->name('insert-kategori');
Route::get('/Kategori/Edit/{id}', [KategoriController::class, 'edit'])->name('edit-kategori');
Route::post('/Kategori/Update/{id}', [KategoriController::class, 'update'])->name('update-kategori');
Route::get('/Kategori/Delete/{id}', [KategoriController::class, 'delete'])->name('delete-kategori');

//Objek Wisata
Route::get('/ObjekWisata', [ObjekWisataController::class, 'index'])->name('objek-wisata');
Route::get('/ObjekWisata/Add', [ObjekWisataController::class, 'create'])->name('add-objek-wisata');
Route::post('/ObjekWisata/Insert', [ObjekWisataController::class, 'insert'])->name('insert-objek-wisata');
Route::get('/ObjekWisata/Edit/{id}', [ObjekWisataController::class, 'edit'])->name('edit-objek-wisata');
Route::post('/ObjekWisata/Update/{id}', [ObjekWisataController::class, 'update'])->name('update-objek-wisata');
Route::get('/ObjekWisata/Delete/{id}', [ObjekWisataController::class, 'delete'])->name('delete-objek-wisata');

//User
Route::get('/UserProfile', [UserController::class, 'index'])->name('user');
Route::get('/UserProfile/Add', [UserController::class, 'create'])->name('add-user');
Route::post('/UserProfile/Insert', [UserController::class, 'insert'])->name('insert-user');
Route::get('/UserProfile/Edit/{id}', [UserController::class, 'edit'])->name('edit-user');
Route::post('/UserProfile/Update/{id}', [UserController::class, 'update'])->name('update-user');
Route::get('/UserProfile/Delete/{id}', [UserController::class, 'delete'])->name('delete-user');

//Home
Route::get('/Kabupaten/{id}', [HomeController::class, 'kabupaten'])->name('home-kabupaten');
Route::get('/Kategori/{id}', [HomeController::class, 'kategori'])->name('home-kategori');
Route::get('/DetailObjekWisata/{id}', [HomeController::class, 'detailobjekwisata'])->name('detail-objek-wisata');
