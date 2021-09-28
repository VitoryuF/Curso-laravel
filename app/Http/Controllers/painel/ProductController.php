<?php

namespace App\Http\Controllers\painel;

use App\Models\painel\products;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use App\Http\Requests\painel\ProductFormRequest;

class ProductController extends Controller
{

    // Para ter informações sobre a variavel ou objeto usando dd($variavel/objeto)
    private $products;
    public function __construct(products $products){
        $this->products = $products;
    }


// ----------------------------------------------

    public function index(){
        $products = $this->products->all();

        $title = 'Home Page';

        return view('painel.products.index', compact('products', 'title'));
    }



// ----------------------------------------------

    public function teste(){

//Inserir dados na tabela criando a variavel $prod que está recebendo todo o conteudo, usando o metodo insert/$insert.
        // $prod = $this->products;
        // $prod->name = 'Nome do Produto';
        // $prod->number = 25118;
        // $prod->active = true;
        // $prod->image = 'Imagem';
        // $prod->categoria = 'Eletro';
        // $prod->desc = 'Descrição 01';
        // $insert = $prod->save();

        // if($insert){
        //     return 'Inserido com Sucesso!';
        // }else{
        //     return 'Falha ao inserir!';
        // }



//Inserir dados na tabela criando a variavel $prod que está recebendo todo o conteudo, usando o metodo insert/$insert.
//Porém aqui é criada uma variavel com nome insert onde recebe os dados do objeto products usando o metodo insert
        // $insert = $this->products->insert([
        //     'name'      => 'Computador',
        //     'number'    => 225446,
        //     'active'    => '2',
        //     'image'     => 'Imagem1',
        //     'categoria' => 'Eletro',
        //     'desc'      => 'Descrição computador'
        // ]);

        // if($insert){
        //     return 'Inserido com Sucesso!';
        // }else{
        //     return 'Falha ao inserir!';
        // }


////Inserir dados na tabela criando a variavel $prod que está recebendo todo o conteudo, usando o metodo create, porém é necessário definir uma lista de colunas autorizadas a ser preenchidas pelo usuário no aquivo model, um meio de receber os dados do cliente com mais segurança.
        //  $insert = $this->products->create([
        //     'name'      => 'Toalha',
        //     'number'    => 122,
        //     'active'    => '2',
        //     'image'     => 'Imagem Toalha',
        //     'categoria' => 'Banho',
        //     'desc'      => 'Descrição Toalha'
        // ]);

        // if($insert){
        //     return "Inserido com Sucesso! Id do cadastro ($insert->id)";
        // }else{
        //     return 'Falha ao inserir!';
        // }

        // $prod = $this -> products -> find(3);
        //Variavel          //Objeto   //metodo
            // dd($prod->desc);



        // Atualizar dados da tabela criando uma variavel localizando o item da tabela usando where, informando qual coluna da tabela Ex:id, nome.
        // $prod = $this -> products -> where('id', 3);
        // $update = $prod->update([
        //     'name'      => 'Ventila',
        //     'number'    => 3010,
        //     'active'    => '2',
        //     'image'     => 'Imagem ventila',
        //     'categoria' => 'Eletro',
        //     'desc'      => 'Descrição Ventila'
        // ]);

        // if($update){
        //     return "Alteração do cadastro!";
        // }else{
        //     return "Alteração falhou!";
        // }



        // deletar itens da tabela
        // $prod = $this -> products -> where('id', 2);
        // $delete = $prod->delete();

        // if($delete){
        //     return "Alteração do cadastro!";
        // }else{
        //     return "Alteração falhou!";
        // }

    }
// ----------------------------------------------


    public function create(){
        $categorias = ['Banho', 'Eletro', 'Limpeza', 'Pessoal'] ;
        $title = 'Cadastro';
        $botao = 'CADASTRAR';
        return view('painel.products.create-edit', compact('title', 'botao',  'categorias'));
    }

// ----------------------------------------------

    public function store(ProductFormRequest $request){

        $dataform = $request->all();
        //acima a varialvel dataform recebe uma requisição (request do tipo post), vindo do formulario, usando o metodo all que engloba todos os dados que o formulario recebeu
        $dataform['active'] = isset($dataform['active']) ? 1 : 0;

        // Favor verificar porquer esta estrutura abaixo não funciona exatamente como o isset que se encontra acima
        // if($dataform['active'] !== 1){
        //     $dataform['active'] = 0;
        // }else{
        //     $dataform['active'] = 1;
        // }24


        // $messeges = [
        //     'name.required' => 'Campo nome obrigatório!',
        //     'number.required' => 'Campo número obrigatório!',
        //     'number.numeric' => 'Campo deve obter somente números!',
        //     'categoria.required' => 'Obrigatório escolher categoria!',
        //     'desc.min:3|max:1000' => 'Descrição com mais de 3 caracteres obrigatória!'//mensagem desc não funciona.
        // ];

        //Validação de dados
        // $this->validate($request, $this->products->rules);
        // $validate = validator($dataform, $this->products->rules, $messeges);
        // if($validate->fails()){
        //     return redirect()
        //         ->route('create')
        //         ->withErrors($validate)
        //         ->withInput();
        // }


        $create = $this->products->create($dataform);
        //acima a variavel $create recebe o metodo create para adquirir os dados vindos da variavel $dataform inserindo-os no objeto products.


        if($create){
            return redirect()->route('index');//favor verificar porque não está sendo preciso informar o caminho da rota index!!
        }else{
            return redirect()->back();
        }
        //acima é feito o redirecionamento dependendo do resultado da criação do banco de dados





        // Para diversos processos onde manipulamos dados é possível espicifica-los de maneira livre, primeiro como já vimos antes, podemos usar o metodo all() que seleciona todos os dados da request para manipularmos
        // dd($request->all());

        // Ou only, onde podemos selecionar quais dados queremos usando um array
        // dd($request->only(['name', 'number']));

        // Ou o except, onde podemos selecionar quais dados não irão ser selecionados
        // dd($request->except(['name','number']));


    }
// ----------------------------------------------

    public function edit($id){
    // se for possível usar find, use sempre
    $products = $this->products->find($id);

    $title = 'Editar cadastro';
    $botao = 'ATUALIZAR';

    $categorias = ['Banho', 'Eletro', 'Limpeza', 'Pessoal'] ;

    return view('painel.products.create-edit', compact('title', 'botao', 'categorias',  'products'));

    // Neste metodo usamos a mesma viw do met create, porem recuperando o conteudo id quem do objeto product, assim deixando o formulario já preenchido

    }

// ----------------------------------------------
    public function update(request $request, $id){
        return "atualizando... $id";
    }
}
