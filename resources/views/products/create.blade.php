@extends('layouts.master')

@section('content')
<h1>Crear un Producto</h1>


<form method="POST" action="{{route('products.store')}}">
    @csrf
    {{-- csrf es un token que deben tener los formularios por seguridad, incluye un capo oculto en el form --}}
    <div class="form-row">
        <label>Titulo</label>
        <input type="text" class="form-control" name="title" value="{{ old('title') }}">
    </div>
    <div class="form-row">
        <label>Descripción</label>
        <input type="text" class="form-control" name="description" value="{{ old('description') }}">
    </div>
    <div class="form-row">
        <label>Precio</label>
        <input type="number" class="form-control" name="price" min="1.00" step="0.01" value="{{ old('price') }}">
    </div>
    <div class="form-row">
        <label>Stock</label>
        <input type="number" class="form-control" name="stock" min="0" value="{{ old('stock') }}">
    </div>
    <div class="form-row">
        <label>Status</label>
        <select class="custom-select" name="status">
            <option value="" selected>Seleccione</option>
            <option {{old('status') == 'Disponible' ? 'selected' : '' }} value="Disponible">Disponible</option>
            <option {{old('status') == 'NoDisponible' ? 'selected' : '' }} value="NoDisponible">No Disponible</option>
        </select>
    </div>
    <div class="form-row">
        <button type="submit" class="btn btn-primary btn-lg">Crear</button>
    </div>
</form>
@endsection
