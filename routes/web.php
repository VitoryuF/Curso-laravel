<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Routing\RouteUrlGenerator;
use PharIo\Version\GreaterThanOrEqualToVersionConstraint;
use League\CommonMark\Extension\ExternalLink\ExternalLinkProcessor;

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


/*
O QUE SÃO ROTAS!?
Se pesquisar pela definição de rotas vai encontrar centenas de tutoriais com teorias super mirabolantes sobre este assunto, mas particularmente gosto de ser mais breve e objetivo e definir rotas como URL AMIGÁVEIS.
Imagine que temos uma aplicação que acessamos ela pelo seu endereço de domínio www.especializati.com.br/

Quando acessamos www.especializati.com.br estamos utilizando a rota “/”
Quando acessamos www.especializati.com.br/contato estamos utilizando a rota “/contato”
Quando acessamos www.especializati.com.br/empresa estamos utilizando a rota “/empresa”
Mais informações https://blog.especializati.com.br/rotas-no-laravel/
*/


/*
01 - Rotas do tipo GET é para retornar algo, como por exemplo uma listagem de conteúdo e etc.
*/
Route ::get('/contato', function(){
    return view('testes.contato');
});

Route ::get('/empresa', function(){
    return view('empresa');
});

Route::get('/', function () {
    return view('welcome');
});

/*02 - Rota any feita para executar qualquer verbo http(tipo de rota)*/
Route::any('/rota', function(){
    return 'any';
});



/*03 - Rota onde é possível executar verbos http selecionadas*/
Route::match(['get', 'post'], '/rota', function(){
    return 'any';
});


/*04 - Rota onde é possível executar um parametro seguido de um subparametro onde este subparamentro é dinâmico, poderá ser inserido qualquer valor ou texto.
O que poderia ser útil quando houve uma grande cadeia de subparametros
AULA 11
*/
Route::get('/categorias/{cat}', function($cat){
    return "Categoria escolhida {$cat}";
});


/*04 - Rota onde é possível executar um parametro seguido de um subparametro odne este subparamentro é dinâmico, poderá ser inserido qualquer valor ou texto.
O que poderia ser útil quando houve uma grande cadeia de subparametros
Também é possível adcionar um prefixo, onde o parametro ainda pode ser qualquer um porém com prefixo (prefixo = /1)
*/
Route::get('/categorias/{cat}/1', function($cat){
    return "Categoria escolhida {$cat}";
});


/*04 - Rota onde é possível executar um parametro seguido de um subparametro onde este subparamentro é dinâmico, poderá ser inserido qualquer valor ou texto.
O que poderia ser útil quando houve uma grande cadeia de subparametros
E caso não seja inserido um subparametro, podemos deixar um valor padrão, basta adicionar '?'
 onde declaramos o subparametro e informar o valor default na function
 */
Route::get('/categorias/{cat?}', function($cat = ' = CATEGORIA NÃO INFORMADA'){
    return "Categoria escolhida {$cat}";
});

Route::get('/categorias/{cat?}/2', function($cat = ' = CATEGORIA NÃO INFORMADA'){
    return "Categoria escolhida {$cat}";
});


/*05 - Uma função que parece muito útil é o redirect, onde pode ser usado para quando uma página está com muitos acessos, sendo necessário usar uma página de contingência, ao retornar a function deve ser inserido o redirect.*/
// Route::get('/redirect1', function(){
//     return redirect('/redirect2');
// });

// route::get('/redirect2',function(){
//     return 'Redirect2';
// });

/*Também pode ser feito de outra maneira mais compacta*/

Route::redirect('/redirect1', '/redirect2');
Route::get('/redirect2',function(){
    return 'Redirect2';
});

/*View, que pode usar usado também de forma mais compacta, porém é recomendável que seja usado de modo compacto em views que sejam simples*/
Route::view('/view', 'welcome');


/*Em manutenções futuras para que não seja preciso alterar nome de variaveis e/ou views
podemos nomear rotas.*/
Route::get('/redirect3', function(){
    return redirect()->Route('old-url1');
});






Route::get('/new-url', function(){
    return 'New-Url';
})->name('old-url1');

// É POSSÍVEL EFETUAR CONJUNTO DE ROTAS COM A MESMA COM OS MESMOS PARAMETROS E COMPONENTES REUNIDOS POR GRUPO.
/*
METODOS LISTADOS AQUI SÃO O, MIDDLEWARE, PREFIX, NAMESPACE E NAME.

O METODO MIDDLEWARE É NECESSÁRIO PARA AUTENTICAÇÃO, USANDO 'auth' E OUTRAS OPÇÕES

O PREFIX É USADO PARA REUNIR ROTAS COM METODOS COM AS MESMAS ESPECIFICAÇÕES NO METODO NAME ->name('admin.name1')

O METODO NAMESPACE É USADO PARA LOCALIZAR FUNÇÕES E ARQUIVOS ExternalLinkProcessor
*/
// Route::middleware([])->group(function (){

//     Route::prefix('admin')->group(function(){

//         Route::namespace('App\Http\Controllers\Admin')->group(function(){

//             Route::name('admin.')->group(function(){
//                 Route::get('/2', 'TesteController@teste')->name('home');

//                 Route::get('/name1', 'TesteController@teste')->name('name1');

//                 Route::get('/name2', 'TesteController@teste')->name('name2');

//                 Route::get('/name3', 'TesteController@teste')->name('name3');

//                 Route::get('/', function(){
//                     return redirect()->route('name1');
//                 })->name('home');

//             });

//         });



//         // Route::get('/', function(){
//         //     return 'HOME PAGE DASHBOARD';
//         // });

//         // Route::get('/name1', function(){
//         //     return 'Cliente 1';
//         // });

//         // Route::get('/name2', function(){
//         //     return 'Cliente 2';
//         // });

//         // Route::get('/name3', function(){
//         //     return 'Cliente 3';
//         // });



//     });

// });


Route::get('/admin/login', function(){
    return 'Login';
})->name('login');

Route::get('/admin', 'App\Http\Controllers\Admin\TesteController@teste')->name('homepage');

//É POSSÍVEL CRIAR UMA ROTA ONDE PODEMOS INSERIR DIVERSOS METODOS APLICADOS PARA UM CONJUNTOS DE SUBROTAS
Route::group([
    'middleware' => [],
    'prefix' => 'admin',
    'namespace' => 'App\Http\Controllers\Admin'
], function(){
    Route::name('admin.')->group(function(){

                Route::get('/name1', 'TesteController@teste')->name('name1');

                Route::get('/name2', 'TesteController@teste')->name('name2');

                Route::get('/name3', 'TesteController@teste')->name('name3');

                Route::get('/', function(){
                    return redirect()->route('admin.name1');
                })->name('home');
    });
});

//Verbo http feito para comprimir conjuntos de controllers baseando-se em funcões que foram criadas dentro arquivo controller, bastando inserir no terminal "php artisan make:controller 'nomedoresource' --resource
Route::resource('/alunos', '\App\Http\Controllers\AlunoController');


// Route::prefix('/alunos')->group(function(){
//     Route::name('alunos.')->group(function () {
//         Route::delete('{id}/del', '\App\Http\Controllers\AlunoController@delete')->name('del');
//         Route::put('{id}/update', '\App\Http\Controllers\AlunoController@update')->name('update');
//         Route::post('/create', '\App\Http\Controllers\AlunoController@create')->name('create');
//         Route::get('/cadastro', '\App\Http\Controllers\AlunoController@cadastro')->name('cadastro');
//         Route::get('/{id}/edit', '\App\Http\Controllers\AlunoController@edit')->name('edit');

//         Route::get('{id}', '\App\Http\Controllers\AlunoController@show')->name('show');
//         Route::get('/', 'App\Http\Controllers\AlunoController@index')->name('index');
//     });
// });


// A sigla CRUD representa os quatro verbos básicos de interação com o banco de dados: Create, Read, Update, Delete (Criar, Ler, Atualizar, Deletar)