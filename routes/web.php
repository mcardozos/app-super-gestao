<?php

use App\Http\Middleware\logAcessoMiddleware;
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


Route::get('/', [App\Http\Controllers\PrincipalController::class, 'index'])->name('site.index');
Route::get('/sobre', [App\Http\Controllers\SobreNosController::class, 'index'])->name('site.sobrenos')->middleware('log.acesso');
Route::get('/contato', [App\Http\Controllers\ContatoController::class, 'index'])->name('site.contato');
Route::post('/contato', [App\Http\Controllers\ContatoController::class, 'salvar'])->name('site.contato');
Route::get('/login/{erro?}', [App\Http\Controllers\LoginController::class, 'index'])->name('site.login');
Route::post('/login', [App\Http\Controllers\LoginController::class, 'autenticar'])->name('site.login');

Route::middleware('autenticacao')->prefix('/app')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('app.home');
    Route::get('/sair', [App\Http\Controllers\LoginController::class, 'sair'])->name('app.sair');
    Route::get('/cliente', [App\Http\Controllers\ClienteController::class, 'index'])->name('app.cliente');
    Route::get('/fornecedor', [App\Http\Controllers\FornecedorController::class, 'index'])->name('app.fornecedor');
    Route::get('/produto', [App\Http\Controllers\ProdutoController::class, 'index'])->name('app.produto');
});

Route::fallback(function(){
    echo 'Página acessada não existe. <a href="'.route('site.index').'">Clique aqui </a>para retornar a página inicial!';
});


// Route::get('/', [App\Http\Controllers\PrincipalController::class, 'index']);
// Route::get('/sobre', [App\Http\Controllers\SobreNosController::class, 'index']);
// Route::get('/contato', [App\Http\Controllers\ContatoController::class, 'index']);
// Route::get('/login', [App\Http\Controllers\LoginController::class, 'index']);

// Route::prefix('/app')->group(function () {
//     Route::get('/cliente', [App\Http\Controllers\ClienteController::class, 'index']);
//     Route::get('/fornecedor', [App\Http\Controllers\FornecedorController::class, 'index']);
//     Route::get('/produto', [App\Http\Controllers\ProdutoController::class, 'index']);
// });

// Route::fallback(function(){
//     echo 'Página acessada não existe. <a href="'.route('site.index').'">Clique aqui </a>para retornar a página inicial!';
// });
// Route::get('/teste/{p1}/{p2}',[App\Http\Controllers\TesteController::class, 'index'])->name('site.teste');

// Route::get('/rota2', function () {
//     return redirect()->route('site.rota1');
// })->name('site.rota2');


// Route::redirect('/rota2','/rota1');


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/sobrenos', function () {
//     return 'Olá, você esta em sobre nós';
// });

// Route::get('/contato/{nome}/{categoria_id}', function (string $nome, int $categoria_id = 1) {
//     echo 'Menu nome é: ' . $nome . ' - ' . $categoria_id;
// })->where('categoria_id', '[0-9]+')
//     ->where('nome', '[A-Za-z]+');
