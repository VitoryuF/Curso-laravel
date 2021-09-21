<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class AlunoController extends Controller
{
    protected $request;

    public function __construct(Request $request){
        $this->request = $request;
    }//o metodo construct recebe os dados que o cliente nos deu no Request informado no "use Illuminate\Http\Request;", em seguida insere este conteudo em uma variavel chamada $request "__construct(Request $request)" e dentro do metodo __construct inserimos este mesmo conteudo para outra variavel fora do metodo construct usando $this, onde a variavel $request que está fora do metodo agora também contém este conteudo.



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('site.teste');

        $n = 122;
        $vet = [1,2,3,4,5,6,7,8,9,10];
        $test = '<h1>Teste de views</h1>';
        return view('turmas.pages.alunos.index', compact($n,$vet, $test)
        //É possível criar um return onde temos um vetor, neste vetor pode ter o conteúdo que deseja exibir na tela. Basta especificar o namespace da view -> 'site.teste', depois informar o indice com suas variaveis.

        );


    }

    public Function cursos() {
        return view('turmas.pages.cursos.cjt-curso1');
    }

    public function contato(){
        return view('turmas.pages.alunos.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $test = '<h1>Teste de views</h1>';
        return view('site.teste', [
            'teste' => $test
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return "Editando valor $id.";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        return $id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}