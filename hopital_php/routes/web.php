<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserControll;
use App\Http\Controllers\listPController;
use App\Http\Controllers\SearchController;
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
})->name('welcome');

#Route::get('/patients',[UserControll::class,'index']);

#Route::get('/home', [App\Http\Controllers\Frontend\FrontendController::class, 'home']);

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('fiche_patient/{nom}',[listPController::class,'list'])->name('list');

Route::get('recherche_patient',[SearchController::class, 'search'])->name('web.search');





