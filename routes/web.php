<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
     return [
        'message' => 'Welcome to Patients Service API'
    ];
});
