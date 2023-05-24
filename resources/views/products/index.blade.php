@extends('layouts.app')

@section('content')
<h1><i class="fa-solid fa-user"></i>Listado de Productos</h1>

<a class="btn btn-success btn-lg mb-3" href="{{route('products.create')}}">Nuevo Producto</a>


@if(count($products)==0)
<div class="col text-center animate__animated animate__flash">
    <div class="alert alert-warning" role="alert">
        <div class="col">
            <i class="fa-solid fa-triangle-exclamation fa-6x animate__animated animate__pulse animate__infinite"></i>
        </div>
        <div class="col">
            <h4 class="alert-heading">Sin productos</h4>
            <p>No se encontraron productos en el sistema</p>
        </div>
    </div>
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
@endif
@endsection
