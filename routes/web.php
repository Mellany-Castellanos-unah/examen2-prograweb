<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout.admin');
});

Route::get('/productos', function () {
    return 'Vista de productos temporal';
})->name('productos.index');

Route::get('/productos/create', function () {
    return 'Vista de crear producto temporal';
})->name('productos.create');

