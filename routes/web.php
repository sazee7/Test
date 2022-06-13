<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/part1', 'Part1Controller');
Route::resource('/part2', 'Part2Controller');
Route::resource('/part3', 'Part3Controller');
Route::get('/part3-2', 'Part3Controller@second');
