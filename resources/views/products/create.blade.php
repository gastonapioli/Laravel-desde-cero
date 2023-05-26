@extends('layouts.app')

@section('content')
<h1>Crear un Producto</h1>


<form method="POST" action="{{route('products.store')}}" onsubmit="btnLoad()">
    @csrf
    {{-- csrf es un token que deben tener los formularios por seguridad, incluye un capo oculto en el form --}}


    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="title" id="title" placeholder="Titulo" value="{{ old('title') }}">
        <label for="title">Titulo</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" placeholder="Descripción" class="form-control" name="description" value="{{ old('description') }}">
        <label for="description">Descripción</label>
    </div>
    <div class="form-floating mb-3">
        <input type="number" placeholder="Precio" class="form-control" name="price" min="1.00" step="0.01" value="{{ old('price') }}">
        <label for="price">Precio</label>
    </div>
    <div class="form-floating mb-3">
        <input type="number" placeholder="Stock" class="form-control" name="stock" min="0" value="{{ old('stock') }}">
        <label for="stock">Stock</label>
    </div>
    <div class="form-floating mb-3">
        <select class="form-select" name="status">
            <option value="">Seleccione</option>
            <option {{old('status') == 'Disponible' ? 'selected' : '' }} value="Disponible">Disponible</option>
            <option {{old('status') == 'NoDisponible' ? 'selected' : '' }} value="NoDisponible">No Disponible</option>
        </select>
        <label for="status">Status</label>
    </div>
    <div class="form-floating mt-3">
        <button type="submit" class="btn btn-primary btn-lg">Crear</button>
    </div>
</form>
@endsection
