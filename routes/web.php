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

Route::get('/', function () {
    return view('index');
})->name('index');
$caminho = "App\Http\Controllers";
Route::get('novacategoria', function(){
    return view('novacategoria');
})->name('novacategoria');
Route::post('categorias', $caminho.'\ControladorCategoria@store')->name('categorias');
Route::get('/categorias', $caminho.'\ControladorCategoria@index')->name('categorias');
Route::get('/categorias/apagar/{id}', $caminho.'\ControladorCategoria@destroy')->name('destroyCat');
Route::get('/categorias/editar/{id}', $caminho.'\ControladorCategoria@edit');
Route::post('editarCategoria/editar/{id}',  $caminho.'\ControladorCategoria@update');


#implementando produtos
Route::get('/produtos', $caminho.'\ControladorProduto@index')->name('produtos');
Route::POST('/createProdutos', $caminho.'\ControladorProduto@store')->name('createProdutos');
route::get('removerProduto/{id}', $caminho.'\ControladorProduto@destroy');
route::post('editProduto/{id}', $caminho.'\ControladorProduto@update');
route::get('/buscarProduto', $caminho.'\ControladorProduto@buscar');

#cliente
route::get('/novoCliente', $caminho.'\ClienteControlador@create')->name('novoCliente');
route::POST('/cadCliente', $caminho.'\ClienteControlador@store')->name('cadCliente');
route::get('/cliente', $caminho.'\ClienteControlador@index')->name('cliente');
route::get('removerCliente/{id}', $caminho.'\ClienteControlador@destroy')->name('removerCliente');

route::get('angular', function(){
    return view('angular');
});