<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::namespace('App\\Http\\Controllers')->prefix('/v1')->group(function () {
    Route::prefix('/notebook')->group(function () {
        Route::get('/', 'NotebookController@list');
        Route::post('/', 'NotebookController@create');

        Route::prefix('/{notebook}')->group(function () {
            Route::get('/', 'NotebookController@getById');
            Route::post('/', 'NotebookController@update');
            Route::delete('/', 'NotebookController@destroy');
        });
    });

    Route::post('/storage/upload', 'StorageController@upload');
});
