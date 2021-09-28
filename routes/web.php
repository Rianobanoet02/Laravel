<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CrudController;


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




Route::get('/', [AuthController::class, 'showFormLogin'])->name('login');
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::group(['middleware' => 'auth'], function () {

    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('crud/index', [CrudController::class, 'index']);
    Route::get('/crud/create', [CrudController::class, 'create']);
    Route::post('/crud/create', [CrudController::class, 'store']);
    Route::get('/crud/{id}', [CrudController::class, 'edit']);
    Route::post('/crud/{id}', [CrudController::class, 'update']);
    Route::get('/crud/{id}/delete', [CrudController::class, 'destroy']);
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

});
