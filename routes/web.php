<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\Main\IndexController;
use App\Models\User;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Annotation\Route as AnnotationRoute;
use Illuminate\Support\Facades\Auth;//???

/* ----------------------------------------------------------------------------------------
| Web Routes loaded by the RouteServiceProvider and  assigned to the "web" middleware group
|------------------------------------------------------------------------------------------
*/

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['namespace'=>'Main'], function(){
    Route::get('/', 'IndexController')->name('main.index');
});

Route::group(['namespace'=>'Admin', 'prefix'=> 'admin'], function () {
    Route::group(['namespace'=>'Main'], function(){
        Route::get('/', 'IndexController')->name('admin.index');
        // Route::get('/{category}', 'ShowController');
        // Route::post('/', 'StoreController');
    });
    Route::group(['namespace'=>'Category', 'prefix'=>'categories'], function(){
        Route::get('/', 'IndexController')->name('admin.category.index');
        Route::get('/create', 'CreateController')->name('admin.category.create');
        Route::post('/', 'StoreController')->name('admin.category.store');
        Route::patch('/{category}', 'UpdateController')->name('admin.category.update');
        Route::delete('/{category}', 'DestroyController')->name('admin.category.destroy');
        Route::get('/{category}', 'ShowController')->name('admin.category.show');
        Route::get('/edit/{category}', 'EditController')->name('admin.category.edit');
        // Route::get('/{category}', 'ShowController');
        // Route::post('/', 'StoreController');
    });
});

// Auth::rartioutes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
