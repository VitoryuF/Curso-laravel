@extends('turmas.layouts.app')

@section('title-index', 'Curso laravel - HOME')


@section('content')
<h1>Lista de Alunos</h1>
@endsection



@section('label-teste')
<h1> Label Teste</h1>

{{$test}}
{{$n}}


@if ($n == 12)
    <p>Same</p>
@else
    <p>wrong</p>
@endif

@unless($n == 1)
<p>It's diferent</p>
@endunless


@for($i = 0; $i < 11; $i++)
    <p>Valor: {{$i}}</p>
@endfor

</br>
</br>

@foreach ($vet as $item)
    <p>Foreach: {{$item}}</p>
@endforeach

</br>
</br>

@if(count($vet) > 0)
    @foreach ($vet as $item1)
        <p>Foreach: {{$item1}}
    @endforeach
@else
    <p>Inexistente</p>
@endif

</br>
</br>

{{-- Forelse feito para já contar o número de itens em um vetor e inclui-lo em uma variavel --}}
{{-- @forelse ($vet as $item2)
    <p>Forelse: {{$item2}}</p>
@empty
    <p>Inexistente</p>
@endforelse --}}

</br>
</br>

{{-- Include, feito para incluir conteúdo no documento vindo de outro arquivo --}}
@include('site.include.sidebar')

@endsection

{{-- #11 Curso de Laravel 5.3 - Blade @stacks --}}

@push('name')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>


@endpush
