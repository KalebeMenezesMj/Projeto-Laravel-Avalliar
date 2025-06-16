<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;

Route::get('/', [AppController::class, 'home']);
Route::get('/sobre', [AppController::class, 'sobre']);
Route::get('/contato', [AppController::class, 'contato']);
Route::get('/frmlogin', [AppController::class, 'frmlogin']);
Route::post('/logar', [AppController::class, 'logar']);
Route::get('/frmusuario', [AppController::class, 'frmusuario']);
Route::post('/addusuario', [AppController::class, 'addusuario']);


Route::get('/logout', [AppController::class, 'logout']);

Route::get('/dashboard', [AppController::class, 'dashboard']);

Route::get('/painel-de-controle', [AppController::class, 'painelDeControle']);

// Demandas
Route::get('/produtos', [AppController::class, 'demandas']);
Route::get('/frmdemanda', [AppController::class, 'frmdemanda']);
Route::post('/adddemanda', [AppController::class, 'adddemanda']);
Route::get('/frmeditdemanda/{id}', [AppController::class, 'frmeditdemanda']);
Route::put('/atualizardemanda/{id}', [AppController::class, 'atualizardemanda']);
Route::delete('/excluirdemanda/{id}', [AppController::class, 'excluirdemanda']);

// Usuários
Route::get('/usuarios', [AppController::class, 'usuarios']);
Route::get('/frmeditusuario/{id}', [AppController::class, 'frmeditusuario']);
Route::put('/atualizarusuario/{id}', [AppController::class, 'atualizarusuario']);
Route::delete('/excluirusuario/{id}', [AppController::class, 'excluirusuario']);

// Produtos
Route::get('/frmproduto', [AppController::class, 'frmproduto']);
Route::post('/addproduto', [AppController::class, 'addproduto']);

//contato
Route::post('/contato', [AppController::class, 'salvarContato']);

Route::get('/contatos', [AppController::class, 'listarContatos']);
Route::delete('/contatos/{id}', [AppController::class, 'excluirContato']);