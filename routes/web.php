<?php

use App\Http\Controllers\DossierController;
use App\Http\Controllers\EcritureController;
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

Route::get('/comptes/{uuid}/ecritures', [EcritureController::class ,'index']);
Route::post('/comptes/{uuid}/ecritures', [EcritureController::class ,'store']);

Route::put('/comptes/{uuid}/ecritures/{uuid_ecriture}', [EcritureController::class ,'update']);
Route::delete('/comptes/{uuid}/ecritures/{uuid_ecriture}', [EcritureController::class ,'destroy']);



Route::get('/dossiers/{uuid}', [DossierController::class ,'index']);