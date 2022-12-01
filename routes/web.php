<?php

use \App\Http\Controllers\Generate;
use \App\Http\Controllers\UserPanel;
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
})->name('start');

Route::get('test', [UserPanel::class, 'test'])->name('testing');

Route::prefix('generate/')->group( function () {
    Route::get('record/{count}', [Generate::class, 'generateRecord'])->name('generateRecords');

    Route::get('comment/{count}', [Generate::class, 'generateComment'])->name('generateComments');

    Route::get('user/{count}', [Generate::class, 'generateUser'])->name('generateUsers');
});

//Добавить middleware чтобы проверить залогинен юзверь или нет
Route::get('registration', function () {
    return view('authorization');
})->name('registration');

Route::post('registration', [UserPanel::class, 'regUser'])->name('regUser');

Route::get('authorization', function () {
    return view('authorization');
})->name('authorization');

Route::post('authorization', [UserPanel::class, 'authUser'])->name('authUser');

Route::get('confirmRegistration/{token}', [UserPanel::class, 'confirmUser'])->name('confirmUser');

Route::get('cabinet', [UserPanel::class, 'showUserPage'])->name('homePage');
