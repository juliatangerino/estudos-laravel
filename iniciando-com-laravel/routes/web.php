<?php

# Colhendo informações enviadas no formulário via POST
use Illuminate\Http\Request;
use App\Http\Controllers\ClientsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome'); // helper
});

Route::get('/blade', function () {

    $nome = 'Juliana';
    $sobrenome = 'Tangerino';
    $value = 600;

    return view('teste', compact('nome', 'sobrenome', 'value')); 
});

Route::get('controller/formulario/cadastrar', 'App\Http\Controllers\ClientsController@cadastrar');

// Criando o crud

#Ver todos
Route::get('/clientes', 'App\Http\Controllers\ClientsController@listar');

#Cadastrar
Route::get('/clientes/cadastro', 'App\Http\Controllers\ClientsController@formCadastrar');
Route::post('/clientes/cadastro', 'App\Http\Controllers\ClientsController@cadastrar');

#Editar
Route::get('/clientes/{id}/editar-cadastro', 'App\Http\Controllers\ClientsController@formEditar');
Route::post('/clientes/{id}/editar-cadastro', 'App\Http\Controllers\ClientsController@editar');

#Excluir
Route::get('/clientes/{id}/excluir', 'App\Http\Controllers\ClientsController@excluir');

/*

Route::get('/formulario', function () {

    # Gerando o csrf
    $csrfToken = csrf_token();

    # Guardando todo o HTML na variavel
    $html = <<<HTML
    

    <html> 
        <body>
            <h1>Cliente:</h1>
            <form action="/formulario/cadastrar" method="post">
                <input type="hidden" name="_token" value="$csrfToken">
                <input type="text" name="nome">
                <button type="submit">Enviar</button>
            </form>
        </body>
    </html>
    HTML;

    return $html;

});

# Método para o envio das informações via POST

Route::post('/formulario/cadastrar', function (Request $request) {
    echo $request->get('nome');
});

# Criando uma nova rota

Route::get('/cliente', function () {
    return view('welcome');
});

# Criando uma nova rota dinamica. com parametro obrigatório

Route::get('/cliente/{name}', function ($name) {
    return "Produto $name";
});

# Ao utilizar o "?" o parametro se torna opcional e adicionando um valor padrão caso ele não seja informado

Route::get('/fornecedor/{name}/{id?}', function ($name, $id = null) {
    return "Produto $name";
});

*/