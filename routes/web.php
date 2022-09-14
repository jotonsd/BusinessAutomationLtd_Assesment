<?php

use Illuminate\Support\Facades\Route;


// using controllers
use App\Http\Controllers\MainController;

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

Route::controller(MainController::class)->group(function(){
    Route::get('/solution/{id}', 'index');
    Route::get('/check/{id}', 'check_ip')->name('check_ip');
});
