<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;

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
Route::get('/Home', [HomeController::class, 'index'])->name('home');