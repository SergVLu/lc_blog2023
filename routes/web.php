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

Auth::routes(['verify' => true]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['namespace'=>'Main'], function(){
    Route::get('/', 'IndexController')->name('main.index');
});

Route::group(['namespace'=>'Personal', 'prefix'=> 'personal', 'middleware'=>['auth','verified']], function () {
    Route::group(['namespace'=>'Main'], function(){
        Route::get('/', 'IndexController')->name('personal.main.index');
    });
    Route::group(['namespace'=>'Like', 'prefix'=> 'like'], function(){
        Route::get('/', 'IndexController')->name('personal.like.index');
    });
    Route::group(['namespace'=>'Comment', 'prefix'=> 'comment'], function(){
        Route::get('/', 'IndexController')->name('personal.comment.index');
    });
});

Route::group(['namespace'=>'Admin', 'prefix'=> 'admin', 'middleware'=>['auth','admin','verified']], function () {
    Route::group(['namespace'=>'Main'], function(){
        Route::get('/', 'IndexController')->name('admin.index');
    });

    Route::group(['namespace'=>'Category', 'prefix'=>'categories'], function(){
        Route::get('/', 'IndexController')->name('admin.category.index');
        Route::get('/create', 'CreateController')->name('admin.category.create');
        Route::post('/', 'StoreController')->name('admin.category.store');
        Route::get('/{category}', 'ShowController')->name('admin.category.show');
        Route::get('/edit/{category}', 'EditController')->name('admin.category.edit');
        Route::patch('/{category}', 'UpdateController')->name('admin.category.update');
        Route::delete('/{category}', 'DestroyController')->name('admin.category.destroy');
    });
    Route::group(['namespace'=>'Tag', 'prefix'=>'tags'], function(){
        Route::get('/', 'IndexController')->name('admin.tag.index');
        Route::get('/create', 'CreateController')->name('admin.tag.create');
        Route::post('/', 'StoreController')->name('admin.tag.store');
        Route::get('/{tag}', 'ShowController')->name('admin.tag.show');
        Route::get('/edit/{tag}', 'EditController')->name('admin.tag.edit');
        Route::patch('/{tag}', 'UpdateController')->name('admin.tag.update');
        Route::delete('/{tag}', 'DestroyController')->name('admin.tag.destroy');
    });
    Route::group(['namespace'=>'Post', 'prefix'=>'posts'], function(){
        Route::get('/', 'IndexController')->name('admin.post.index');
        Route::get('/create', 'CreateController')->name('admin.post.create');
        Route::post('/', 'StoreController')->name('admin.post.store');
        Route::get('/{post}', 'ShowController')->name('admin.post.show');
        Route::get('/edit/{post}', 'EditController')->name('admin.post.edit');
        Route::patch('/{post}', 'UpdateController')->name('admin.post.update');
        Route::delete('/{post}', 'DestroyController')->name('admin.post.destroy');
    });
    Route::group(['namespace'=>'User', 'prefix'=>'users'], function(){
        Route::get('/', 'IndexController')->name('admin.user.index');
        Route::get('/create', 'CreateController')->name('admin.user.create');
        Route::post('/', 'StoreController')->name('admin.user.store');
        Route::get('/{user}', 'ShowController')->name('admin.user.show');
        Route::get('/edit/{user}', 'EditController')->name('admin.user.edit');
        Route::patch('/{user}', 'UpdateController')->name('admin.user.update');
        Route::delete('/{user}', 'DestroyController')->name('admin.user.destroy');
    });
});

// Auth::rartioutes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
