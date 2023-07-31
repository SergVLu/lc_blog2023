<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\Main\IndexController;
use App\Models\User;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Annotation\Route as AnnotationRoute;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['namespace'=>'Main'], function(){
    Route::get('/', 'IndexController');
});

Route::group(['namespace'=>'Admin', 'prefix'=> 'admin'], function () {
    Route::group(['namespace'=>'Main'], function(){
        Route::get('/', 'IndexController')->name('admin.index');
        // Route::get('/{category}', 'ShowController');
        // Route::post('/', 'StoreController');
    });
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
