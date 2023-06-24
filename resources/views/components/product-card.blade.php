<div class="card">
    <div class="card-header">
        <h4><strong>
            {{ $product->title }} ({{ $product->id }})
        </strong>
    </h4>
</div>
<img class="card-img-top" src="{{asset($product->images->first()->path);}}" alt="" height="350px">
<div class="card-body">
        <h4 class="text-right">${{ $product->price }}</h4>
        <h6 class="card-subtitle mb-2 text-muted">{{ $product->description }}</h6>
        <p class="card-text">           
            <p>{{ $product->stock }}</p>
            <p>{{ $product->status }}</p>
        </p>
    </div>
</div>
