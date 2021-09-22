@extends('site.templates.template')

@section('content')
<h1 class="title-pg">Lista de produtos</h1>
<table>
    <tr>
        <th>Nome</th>
        <th>Descrição</th>
    </tr>
    @foreach($products as $products)
    <tr>
        <td>{{$products->name}}</td>
        <td>{{$products->desc}}</td>
    </tr>
    @endforeach
</table>
@endsection

