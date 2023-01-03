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


Route::get('/',[App\Http\Controllers\PrincipalController::class,'index']);
Route::get('/sobre',[App\Http\Controllers\SobreNosController::class,'index']);
Route::get('/contato',[App\Http\Controllers\ContatoController::class,'index']);
Route::get('/login',[App\Http\Controllers\LoginController::class,'index']);
Route::get('/cliente',[App\Http\Controllers\ClienteController::class,'index']);
Route::get('/fornecedor',[App\Http\Controllers\FornecedorController::class,'index']);
Route::get('/produto',[App\Http\Controllers\ProdutoController::class,'index']);




// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/sobrenos', function () {
//     return 'Olá, você esta em sobre nós';
// });

Route::get('/contato/{nome}/{categoria_id}', function (string $nome, int $categoria_id = 1) {
    echo 'Menu nome é: ' . $nome . ' - ' . $categoria_id;
})->where('categoria_id','[0-9]+')
    ->where('nome','[A-Za-z]+');
