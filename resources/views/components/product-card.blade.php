<div class="card">
    <div class="card-header">
        {{ $product->title }} ({{ $product->id }})
    </div>
    <div class="card-body">
        <h6 class="card-subtitle mb-2 text-muted">{{ $product->description }}</h6>
        <p class="card-text">
            <p>{{ $product->price }}</p>
            <p>{{ $product->stock }}</p>
            <p>{{ $product->status }}</p>
        </p>
    </div>
</div>
