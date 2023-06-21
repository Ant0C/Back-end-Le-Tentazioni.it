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
                <h1>{{ $product->name }}</h1>
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
    </div>
    <div class="container">
        <p>
            {{ $product->description }}
        </p>
    </div>
@endsection
