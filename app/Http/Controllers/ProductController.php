<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\painel\products;

class ProductController extends Controller
{
    // Para ter informações sobre a variavel ou objeto usando dd($variavel/objeto)
    private $products;
    public function __construct(products $products){
        $this->products = $products;
    }

    public function index(){
        $products = $this->products->all();

        return view('painel.products.index', compact('products'));
    }

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
        //     'name'      => 'Geladeira',
        //     'number'    => 12,
        //     'active'    => '1',
        //     'image'     => 'Imagem4',
        //     'categoria' => 'Eletro',
        //     'desc'      => 'Descrição Geladeira'
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


}