@extends('painel.products.index')

@section('contente')
<h2>Lista de produtos</h2></br>
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
