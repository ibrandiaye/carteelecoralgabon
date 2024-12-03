<?php

use App\Http\Controllers\ArrondissementController;
use App\Http\Controllers\CommoudeptController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\SiegeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('province', ProvinceController::class)/*->middleware("auth")*/;
Route::resource('commoudept', CommoudeptController::class)/*->middleware("auth")*/;
Route::post('/importer/province',[ProvinceController::class,'importExcel'])->name("importer.province")/*->middleware("auth")*/;
Route::post('/importer/commoudept',[CommoudeptController::class,'importExcel'])->name("importer.commoudept")/*->middleware("auth")*/;

Route::resource('siege', SiegeController::class)/*->middleware("auth")*/;
Route::resource('arrondissement', ArrondissementController::class)/*->middleware("auth")*/;
Route::post('/importer/siege',[SiegeController::class,'importExcel'])->name("importer.siege")/*->middleware("auth")*/;
Route::post('/importer/arrondissement',[ArrondissementController::class,'importExcel'])->name("importer.arrondissement")/*->middleware("auth")*/;
