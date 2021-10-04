@extends('painel.templates.template1')

@section('content')
<h1 class="title-pg">Lista de produtos</h1>
<table class="table table-dark table-hover">
        <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Número</th>
        <th>Ações</th>

    </tr>
    @foreach($products as $products)
    <tr>
        <td>{{$products->id}}</td>
        <td>{{$products->name}}</td>
        <td>{{$products->desc}}</td>
        <td>{{$products->number}}</td>
        <td>
            {{-- Tambem seria possível usando a url: --}}
            {{-- <a href="{{url("/painel/produtos/{$products->id}/edit")}}" class="action edit"> --}}
                <a href="{{route('edit', $products->id)}}" class="action edit">
                <span class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                      </svg>
                </span>
            </a>

            <a href="{{route('show', $products->id)}}" class="action delete">
                <span class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                        <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                      </svg>
                </span>
            </a>
        </td>
    </tr>

    @endforeach
</table>

<a href="{{route('create')}}" class="btn btn-dark">
    {{-- Identificar url do botão Cadastrar: colocar a rote e name da rota {{route('create')}} ou url(painel/produtos/create) --}}
    <span>
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
    </svg>
    </span>
    Novo usuario?
</a>

{{-- {!!$products->links()!!} --}}
@endsection

