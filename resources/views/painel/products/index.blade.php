<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
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
</body>
</html>
