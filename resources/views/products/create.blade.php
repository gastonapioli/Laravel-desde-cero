@extends('layauts.master')

@section('content')
<h1>Crear un Producto</h1>


<form method="POST" action="{{route('products.store')}}">
    @csrf
    {{-- csrf es un token que deben tener los formularios por seguridad, incluye un capo oculto en el form --}}
    <div class="form-row">
        <label>Titulo</label>
        <input type="text" class="form-control" name="title" required>
    </div>
    <div class="form-row">
        <label>Descripción</label>
        <input type="text" class="form-control" name="description" required>
    </div>
    <div class="form-row">
        <label>Precio</label>
        <input type="number" class="form-control" name="price" min="1.00" step="0.01" required>
    </div>
    <div class="form-row">
        <label>Stock</label>
        <input type="number" class="form-control" name="stock" min="0" required>
    </div>
    <div class="form-row">
        <label>Status</label>
        <select class="custom-select" name="status" required>
            <option value="" selected>Seleccione</option>
            <option value="disponible">Disponible</option>
            <option value="nodisponible">No Disponible</option>
        </select>
    </div>
    <div class="form-row">
        <button type="submit" class="btn btn-primary btn-lg">Crear</button>
    </div>
</form>
@endsection
