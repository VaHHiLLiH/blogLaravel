<?php

use \App\Http\Controllers\Generate;
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

Route::prefix('generate/')->group( function () {
    Route::get('record/{count}', [Generate::class, 'generateRecord'])->name('generateRecords');

    Route::get('comment/{count}', [Generate::class, 'generateComment'])->name('generateComments');

    Route::get('user/{count}', [Generate::class, 'generateUser'])->name('generateUsers');
});
