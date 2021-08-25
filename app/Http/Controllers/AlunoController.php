<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function index(){
        $alunos = ['Aluno 1', 'Aluno 2', 'Alunos 2'];
        return $alunos;
    }

    public function del($id) {
        return "Deletando cadastro do aluno $id";
    }

    public function update($id) {
        return "Atualizando cadastro do aluno $id";
    }

    public function create($id) {
        return "Criando cadastro do aluno $id";
    }

    public function show($id){
        return "Aluno selecionado $id";
    }

    public function cadastro() {
        return "Cadastro de aluno!";
    }

    public function edit($id) {
        return "Editar cadastro do aluno $id";
    }
}