@extends('painel.templates.template1')

@section('content')
<h1 class="title-pg">
    <a href="{{route('index')}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
        <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"/>
      </svg> Voltar</a></br>
      Produto {{$products->name}}
</h1>
<div class="white-font">
    @if(isset($products) && ($products->active == 1))
    <p><b>Ativo: </b><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
        <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"/>
        <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"/>
      </svg></p>
    @else
    <p><b>Ativo: </b><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
      </svg></p>
    @endif
<p><b>Nome: </b>{{$products->name}}</p>
<p><b>Número de série: </b>{{$products->number}}</p>
<p><b>Descrição: </b>{{$products->desc}}</p>


<hr>
{!! Form::open(['route' => ['destroy', $products->id], 'method' => 'delete']) !!}
    {!! Form::submit('APAGAR', ['class' => 'btn btn-danger']) !!}
{!! Form::close() !!}
</div>
@endsection

