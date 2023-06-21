@extends('layouts.app-admin')

@section('content')
    <div class="container py-5">
        <h1>Modifica prodotto</h1>
    </div>
    <div class="container">
        <form action="{{ route('products.update', $product) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nome prodotto</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $product->name) }}" id="name" aria-describedby="nameHelp">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <input type="text" name="description" class="form-control @error('description') is-invalid @enderror"
                    value="{{ old('description', $product->description) }}" id="title"
                    aria-describedby="descriptionHelp">
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input type="text" name="price" class="form-control @error('price') is-invalid @enderror"
                    value="{{ old('price', $product->price) }}" id="price" aria-describedby="priceHelp">
                @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="visible" class="form-label">Disponibilità</label>
                <input type="text" name="visible" class="form-control @error('visible') is-invalid @enderror"
                    value="{{ old('visible', $product->visible) }}" id="visible" aria-describedby="visibleHelp">
                @error('visible')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="size" class="form-label">Misura</label>
                <input type="text" name="size" class="form-control @error('size') is-invalid @enderror"
                    value="{{ old('size', $product->size) }}" id="size" aria-describedby="sizeHelp">
                @error('size')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="color" class="form-label">Colore</label>
                <input type="text" name="color" class="form-control @error('color') is-invalid @enderror"
                    value="{{ old('color', $product->color) }}" id="color" aria-describedby="colorHelp">
                @error('color')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">MODIFICA</button>
        </form>
    </div>
@endsection
