<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/jobs', function () {
    return view('jobs');
});
Route::get('/job', function () {
    return view('job');
});
