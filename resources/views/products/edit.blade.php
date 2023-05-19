@extends('layouts.app')

@section('content')
<h1>Editar un Producto</h1>


<form method="POST" action="{{route('products.update', ['product' => $product->id])}}">
    @csrf
    {{-- csrf es un token que deben tener los formularios por seguridad, incluye un capo oculto en el form --}}
    @method('PUT')
    <div class="form-row">
        <label>Titulo</label>
        <input type="text" class="form-control" name="title" value="{{old('title') ?? $product->title}}" required>
    </div>
    <div class="form-row">
        <label>Descripción</label>
        <input type="text" class="form-control" name="description" value="{{old('description') ?? $product->description}}" required>
    </div>
    <div class="form-row">
        <label>Precio</label>
        <input type="number" class="form-control" name="price" min="1.00" step="0.01" value="{{old('price') ?? $product->price}}" required>
    </div>
    <div class="form-row">
        <label>Stock</label>
        <input type="number" class="form-control" name="stock" min="0" value="{{old('stock') ?? $product->stock}}" required>
    </div>
    <div class="form-row">
        <label>Status</label>
        <select class="custom-select" name="status" required>
            <option {{old('status') == 'Disponible' ? 'selected' : ($product->status == 'Disponible' ? 'Selected' : '')}} value="Disponible">Disponible</option>
            <option {{old('status') == 'NoDisponible' ? 'selected' : ($product->status == 'NoDisponible' ? 'Selected' : '')}} value="NoDisponible">No Disponible</option>
        </select>
    </div>
    <div class="form-row mt-3">
        <button type="submit" class="btn btn-primary btn-lg">Actualizar</button>
    </div>
</form>
@endsection
