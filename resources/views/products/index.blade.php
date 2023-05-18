@extends('layouts.master')

@section('content')
<h1>Listado de Productos</h1>

<a class="btn btn-success btn-lg" href="{{route('products.create')}}">Nuevo Producto</a>

@empty($products)
<div class="alert alert-warning">
    <h5>La lista de productos está vacía</h5>
</div>
@else
<div class="table-responsive">
    <table class="table table-striped">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->title }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->status }}</td>
                <td>
                    <a class="btn btn-link" href="{{route('products.show', [
                        'product'=> $product->id
                    ])}}">Mostrar</a>
                    <a class="btn btn-link" href="{{route('products.edit', [
                        'product'=> $product->id
                    ])}}">Editar</a>

                    <form method="POST" action="{{ route('products.destroy', ['product'=>$product->id]) }}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-link">Eliminar</button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endempty
@endsection
