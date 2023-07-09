{{-- @extends('layouts.app-admin')
@section('content')
    <h1>Show</h1>

    <h1>{{ $product->name }}</h1>
    <a class="btn btn-sm btn-secondary" href="{{ route('products.edit', $product) }}">Modifica</a>
    <form action="{{ route('products.destroy', $product) }}">
        @csrf
        @method('DELETE')
        <input class="btn btn-sm btn-danger" type="submit" value="Elimina">
    </form>
@endsection --}}

@extends('layouts.app-admin')
@section('content')
    <div class="container">
        <div class="d-flex align-items-center">
            <div class="me-auto">
                <div class="container">
                    <div class="container_product">
                        <img src="{{ asset('storage/' . $product->cover_image) }}" alt="" class="img">
                        <img src="{{ asset('storage/' . $product->cover_image_s) }}" alt="" class="overlay">
                        <div class="text">
                            <p>{{ $product->name }}</p>
                            <span class="price">{{ $product->price }} €</span>
                            <p>{{ $product->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex">
            <a class="btn btn-sm btn-secondary" href="{{ route('products.edit', $product) }}">Modifica</a>
            @if ($product->trashed())
                <form action="{{ route('products.restore', $product) }}" method="product">
                    @csrf
                    <input class="btn btn-sm btn-success" type="submit" value="Ripristina">
                </form>
            @endif
        </div>

    </div>
@endsection

<style>
    img {
        width: 300px;
    }

    .text {
        font-family: 'Roboto', sans-serif;
        font-size: 12px;
    }

    .container_product {
        flex-basis: calc(100%/4);
        position: relative;
    }

    .overlay {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        opacity: 0;
        transition: .3s ease;
    }

    .container_product:hover .overlay {
        opacity: 1;
    }
</style>
