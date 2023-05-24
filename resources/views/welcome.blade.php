@extends('layouts.app')

@section('content')
<h1 class="animate__animated animate__bounce">Bienvenidos!!</h1>
@empty ($products)
<div class="alert alert-danger">No hay productos</div>
@else
<div class="row">
    @foreach ($products as $product)
    <div class="col-3 animate__animated animate__bounceIn">
        @include('components.product-card')
    </div>
    @endforeach
</div>
@endempty
@endsection
