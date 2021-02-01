<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\form;

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
    return view('acceuil');
});

Route::get('Ligues', [form::class, 'afficheLigue']);

Route::post('ajoutligue', [form::class, 'ajoutLigue']);

Route::post('modifligue', [form::class, 'modifLigue']);

Route::post('supprimligue', [form::class, 'supprimligue']);

Route::get('Prestations', [form::class, 'affichePrestation']);

Route::post('ajoutprestation', [form::class, 'ajoutPrestation']);

Route::post('modifprestation', [form::class, 'modifPrestation']);

Route::post('supprimprestation', [form::class, 'supprimprestation']);

Route::get('FormulaireFacture', [form::class, 'formfacture']);


