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
//Route::view('/view','welcome'); Forma simplificada da rota abaixo (Só utilizar em views simples)
//

Route::get('/', function () {
    return view('welcome');
}); // Rota padrão
Route::get('/empresa', function(){
    return 'Empresa';
});  // Get busca informações no back
Route::get('/contato', function(){
    return view('site.contato');
});
Route::post('/register', function(){
    return '';
});
Route::any('/any', function(){
    return 'texto Any';
});
Route::post('/register', function(){
    return '';
});
Route::match(['get','post'],'/match', function(){
    return 'texto match';
});

// Rotas variáveis //
Route::get('/categorias/{flag}', function($flag){
    return "Produtos da categorias: $flag";
});// Troca-se a flag por um valor inserido na variável
Route::get('/categoria/{cat}/posts', function($cat){
    return "Post da categorias: {$cat}";
});
Route::get('/produto/{idProduto?}', function($idProduto=''){
    return "Produtos: {$idProduto}";
});// Parametros opcionais - {idProduto?} espera passar um valor padrão para a tag do idPruto,


//Rota direcionável


Route::get('/redirect1', function(){
    return redirect('redirect2');
});
//A rota abaixo é uma forma simplificada das funções da rota acima

Route::redirect('redirect1','redirect2');
Route::get('/redirect2', function(){
    return 'redirect 02';
});


// Forma de redirecionmento automatizado
Route::get('/redirecionamento', function(){
    return redirect()->route('url.nome');
});

Route::get('/nome-url', function(){
    return 'Rota direcionada com sucesso';
})->name('url.nome');


//Grupo de rotas

 /*Dessa forma precisamos colocar diversas vezes o "middleware('auth')", e quando formos alterar
precisaremos fazer uma por uma.
Middleware filtro de acesso do sistema */

/*
Route::middleware([])->group(function(){

    Route::prefix('admin')->group(function(){ // Quando trocar admin por outra coisa, ele vai subsituir a rota

        Route::namespace('Admin')->group(function(){
            Route::get('/dashboard','ControllerTest@teste')->name('dashboard');
            Route::get('/financeiro', 'ControllerTest@teste')->name('financeiro');
            Route::get('/produtos', 'ControllerTest@teste')->name('produtos');
            Route::get('/', function(){
                return redirect()->route('admin.dashboard');
            })->name('home');
        });
    }); O código abaixo resume o codigo comentado aqui
});*/


Route::group([
    'middleware'=>[],
    'prefix'=>'admin',
    'namespace'=>'Admin'
], function(){
    Route::get('/dashboard','ControllerTest@teste')->name('dashboard');
    Route::get('/financeiro', 'ControllerTest@teste')->name('financeiro');
    Route::get('/produtos', 'ControllerTest@teste')->name('produtos');
    Route::get('/', function(){
        return redirect()->route('admin.dashboard');
    })->name('home');
});
// Módulo 2 - Controller

Route::get('/logout', function(){
    return "Tela de login";
})->name('logout');


Route::get('produtos','ProdutoController@index')->name('produtos.index');
