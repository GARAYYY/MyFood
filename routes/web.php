<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.LoginView');
});

Route::get('/register', function () {
    return view('pages.RegisterView');
});
