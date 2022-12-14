<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserPanel;
use App\Http\Repositories\RecordRepository;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('test', function () {
    echo '1';
});

Route::post('updateUser', [UserPanel::class, 'DownloadImage']);

Route::post('getRecords', [RecordRepository::class, 'getPeaceRecords']);

Route::post('getCountRecords', [RecordRepository::class, 'getAllRecords']);
