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
// -----------------DEFINICIÓN DE RUTAS:-------------------------
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;
//----------------------------------------------------------------
Route::get('/', [HomeController::class,'getHome']);
//----------------------------------------------------------------

Route::get('login', function () {
    return view('auth.login');
});
//------------------------------------------------------------------
Route::get('logout', function () { 
    return '<h1 style="color:red;">Logout usuario<h1>';
});
//--------------------------------------------------------------------
Auth::routes();

//--------------------------------------------------------------------
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//--------------------------------------------------------------------
Route::group(['middleware'=>'auth'], function (){
    Route::get('catalog',[CatalogController::class,'getIndex']);
    Route::get('catalog/show/{id}',[CatalogController::class, 'getShow']);
    Route::get('catalog/create',[CatalogController::class, 'getCreate']);
    Route::get('catalog/edit/{id}', [CatalogController::class,'getEdit']);
    
    // Se agrega las rutas de tiṕo POST Y PUT
    Route::post('catalog/create',[CatalogController::class,'postCreate']);
    Route::put('catalog/edit/{id}',[CatalogController::class,'putEdit']);
});