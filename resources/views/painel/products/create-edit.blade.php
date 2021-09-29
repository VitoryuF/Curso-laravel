@extends('painel.templates.template1')

@section('content')
{{-- Todo o css foi produzido por classes bootstrapp --}}
<h1 class="title-pg">{{$title}}</h1>


{{-- Não seria somente trocar o metodo de post para put no form? --}}
@if (isset($products))
{!! Form::model($products, ['route' =>['update', $products->id], 'class' => 'form', 'method' => 'PUT']) !!}
{{-- <form class="form" method="post" action="{{route('update', $products->id)}}">
    {{method_field('PUT')}} --}}
@else
    {!! Form::open(['route' => 'store', 'class' => 'form']) !!}
    {{-- {{method_field('PUT')}}
    <form class="form" method="post" action="{{route('store')}}"> --}}
@endif {{-- Condição para direcionar para a rota update caso a variavel/objeto products tenha banco de dados já existente, inserindo rota infelizmente a requisição ainda será post como definimos anteriormente então inserimos o helper  {{method_field('PUT')}} para declarar que na primeira condição o ver http será alterado para put --}}



{{-- Por meio do laravel collective o token csrf hidden é feito automaticamente --}}

{{-- <input type="hidden" name="_token" value="{{csrf_token()}}"> --}}
    {{-- Input acima feito para gerar uma token que tornará segura a inserção de dados no banco sendo necessário ter name como _token e value como csrf_token() --}}

    <div class="mb-3">
    {{-- Formulario feito usando classes laravel collective abaixo: --}}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Digite o nome']) !!}

    {{-- Formulario feito usando recurso HTML comum abaixo: --}}
    {{-- <input type="text" name="name" placeholder="Nome" class="form-control" value="{{
        isset($products) ? $products->name : old('name')
        }}"> --}}
    {{-- O helper {{old('name')}} é feito recuperar o que foi digitado na sessão anterior, neste caso aqui; quando consta algum depois de clicar em cadastrar  --}}
    </div>

    <div class="mb-3">
    <label class="form-control lab">
        {!! Form::checkbox('active', null, ['class' => 'form-control']) !!}

        {{-- <input type="checkbox" name="active" value="1"

        @if (isset($products) && ($products->active == 1))
        checked
        @endif

        >  --}}
        Item ativo

    </label>
    </div>

    <div class="mb-3">
    {!! Form::text('number', null, ['class' => 'form-control', 'placeholder' => 'Número de série']) !!}

    {{-- <input type="text" name="number" placeholder="Número" class="form-control" value="{{
        isset($products) ? $products->number : old('number')
    }}"> --}}
    </div>

    <div class="mb-3">
    {!! Form::select('categoria', $categorias, '', ['class' => 'form-control', 'placeholder' => 'Cat']) !!}


    <select name="categoria" class="form-control">
        <option value="">Escolha a categoria:</option>
        @foreach ($categorias as $item)
            <option value="{{$item}}"

                @if(isset($products) && ($products->categoria == $item))
                    selected
                @else
                    old({{$item}})
                @endif
                {{-- Dentro da option se a variavel products estiver definida(já contendo o banco de dados) e se uma das opções for uma das disponiveis no formulario será essa a selecionada, ou seja receberá selected --}}

        >{{$item}}</option>
        @endforeach
    </select>

    </div>


    <div class="mb-3">
    {!! Form::textarea('desc', null, ['class' => 'form-control', 'placeholder' => 'Descrição do produto...']) !!}

    {{-- <textarea name="desc" placeholder="Descrição do produto..." class="form-control">{{
        isset($products) ? $products->desc : old('desc')

        }}</textarea>
    </div> --}}


    {!! Form::submit($botao, ['class' => 'btn btn-primary']) !!}


    {{-- <button class="btn btn-primary">
        <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
        </svg>
        </span>{{$botao}}
    </button> --}}

    @if(isset($errors) && count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif
    {{-- É possível utilizar uma variavel com nome $errors que contém mensagens especificando o erro, nesta estrutura o isset é usado para verificar se a variavel existe e se alguma mensagem da variavel $errors está sendo chamada. Depois criamos um loop com foreach onde chamamos todas as mensagens contidas dentro de $errors --}}
{{-- </form> --}}
{!! Form::close() !!}


@endsection
