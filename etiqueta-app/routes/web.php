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

Route::get('/', 'EtiquetaController@index');

Route::resource('etiquetas', 'EtiquetaController');
//Route::get('criarEtiquetas', 'EtiquetaController@index')->name('criarEtiqueta');
Route::get('listaEtiquetas', 'EtiquetaController@listarEtiquetas')->name('listarEtiquetas');
Route::post('pdf', 'EtiquetaController@gerarEtiqueta')->name('gerarEtiqueta');
Route::get('loadEquipamento', 'EtiquetaController@loadEquipamento')->name('loadEquipamento');
Route::get('valida', 'EtiquetaController@valida')->name('valida');
Route::get('show/{id}', 'EtiquetaController@show')->name('show');


//Route::post('loadEquipamento', 'EtiquetaController@loadEquipamento')->name('loadEquipamento');

Route::get('ticket/{id}', 'EtiquetaController@ticket')->name('ticket');
//Route::get('loadEquipamento', 'EtiquetaController@loadEquipamento')->name('loadEquipamento');
//Route::post('/pdf', 'EtiquetaController@store')->name('store');
//Route::resource('etiquetas', [EtiquetaController::class, 'getAll']);


