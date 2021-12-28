<?php

use App\Http\Controllers\ArticoliController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\MailingController;
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

//Route::get('/funny', function () {
//    return new \App\Mail\SendEmail();
//});
Route::get('categorie',[CategorieController::class,'index']);
Route::get('corrotte',[ArticoliController::class,'index']);
Route::get('/',[MailingController::class,'create']);
Route::post('/',[MailingController::class,'store']);
Route::get('/{id?}',[MailingController::class,'show']);
Route::post('/delete/{id?}',[MailingController::class,'destroy']);

