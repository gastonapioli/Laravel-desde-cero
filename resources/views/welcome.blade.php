@extends('layouts.app')

@section('content')
<h1 class="animate__animated animate__bounce">Bienvenidos!!</h1>

<div class="row">

    @forelse ($products as $product)
    <div class="col animate__animated animate__bounceIn">
        @include('components.product-card')
    </div>
    @empty
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
    @endforelse
</div>
@endsection
