<?php

use App\Http\Controllers\EtiquetaController;
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

Route::resource('etiquetas', 'EtiquetaController');
Route::post('/pdf', 'EtiquetaController@gerarEtiqueta')->name('gerarEtiqueta');
Route::post('loadEquipamento', 'EtiquetaController@loadEquipamento')->name('loadEquipamento');
Route::get('loadEquipamento', 'EtiquetaController@loadEquipamento')->name('loadEquipamento');
//Route::post('/pdf', 'EtiquetaController@store')->name('store');
//Route::resource('etiquetas', [EtiquetaController::class, 'getAll']);


