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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[\App\Http\Controllers\PrincipalController::class, 'principal']);
Route::get('/sobrenos',[\App\Http\Controllers\SobreNosController::class, 'sobre']);
Route::get('/contato',[\App\Http\Controllers\ContatoController::class, 'contato']);

// Route::get('/','PrincipalController@principal');

// Route::get('/sobrenos', function () {
//     return 'Olá, você esta em sobre nós';
// });

// Route::get('/contato', function () {
//     return 'Olá, você está em contatos';
// });
