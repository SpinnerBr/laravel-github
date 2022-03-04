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


/*Route::get('/redirect1', function(){
    return redirect('redirect2');
});
Essa rota de cima é uma forma dessimplificada para redirecionar as páginas,
já a de rota debaixo, é mais prática e simples
*/
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

/* Dessa forma precisamos colocar diversas vezes o "middleware('auth')", e quando formos alterar
precisaremos fazer uma por uma.
Middleware filtro de acesso do sistema */
Route::get('/login', function(){
    return "Tela de login";
})->name('login');
Route::middleware([])->group(function(){
    Route::prefix('admin')->group(function(){ // Quando trocar admin por outra coisa, ele vai subsituir a rota
        Route::get('/dashboard', function(){
            return "Home Admin";
        });
        Route::get('/financeiro', function(){
            return "Admin Financeiro";
        });
        Route::get('/produtos', function(){
            return "Admin Produtos";
        });
    });
});
