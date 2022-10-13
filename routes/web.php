<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Controllers')->group(function () {
    Route::namespace('Main')->group(function () {
        Route::get('/', 'IndexController')->name('index');
        Route::get('/search', 'SearchController')->name('search');

        Route::controller('MaterialController')->name('material.')->prefix('material')->group(function () {
            Route::get('show/{slug}', 'show')->name('show');
            Route::middleware('permission:add-material')->group(function () {
                Route::get('/create', 'create')->name('create');
                Route::post('/store', 'store')->name('store');
            });
            Route::delete('/delete/{material}', 'destroy')->middleware('role:admin')->name('destroy');
        });

        Route::controller('CommentController')->name('comment.')->prefix('comment/{material}')->group(function () {
            Route::post('/store/', 'store')->name('store');
            Route::delete('/delete/{comment}', 'destroy')->name('destroy');
        });

        Route::controller('CategoryController')->name('category.')->prefix('category')->group(function () {
            Route::get('/{slug}', 'show')->name('show');
            Route::delete('/{category}', 'destroy')->name('destroy');
        });
    });
});

Auth::routes();
