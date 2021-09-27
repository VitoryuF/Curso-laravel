@extends('painel.templates.template1')

@section('content')
{{-- Todo o css foi produzido por classes bootstrapp --}}
<h1 class="title-pg">Formulario</h1>
<form class="form" method="post" action="{{route('store')}}">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    {{-- Input acima feito para gerar uma token que tornará segura a inserção de dados no banco sendo necessário ter name como _token e value como csrf_token() --}}

    <div class="mb-3">
    <input type="text" name="name" placeholder="Nome" class="form-control" value="{{old('name')}}">
    </div>

    <div class="mb-3">
    <label class="form-control">
        <input type="checkbox" name="active" value="1"> Item ativo
    </label>
    </div>

    <div class="mb-3">
    <input type="text" name="number" placeholder="Número" class="form-control" value="{{old('number')}}">
    </div>

    <div class="mb-3">
    <select name="categoria" class="form-control" >
        <option value="">Escolha a categoria:</option>
        @foreach ($categorias as $item)
            <option value="{{$item}}">{{$item}}</option>
        @endforeach
    </select>
    </div>




    @if(isset($errors) && count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->only('name') as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif





    <div class="mb-3">
    <textarea name="desc" placeholder="Descrição do produto..." class="form-control">{{old('desc')}}</textarea>
    </div>
    <button class="btn btn-primary">
        <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
        </svg>
        </span>Cadastrar
    </button>

    @if(isset($errors) && count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif
    {{-- É possível utilizar uma variavel com nome $errors que contém mensagens especificando o erro, nesta estrutura o isset é usado para verificar se a variavel existe e se alguma mensagem da variavel $errors está sendo chamada. Depois criamos um loop com foreach onde chamamos todas as mensagens contidas dentro de $errors --}}
</form>

@endsection
