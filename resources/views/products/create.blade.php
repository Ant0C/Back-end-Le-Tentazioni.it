@extends('layouts.app-admin')

@section('content')
    <div class="container py-5">
        <h1>Nuovo prodotto</h1>
    </div>
    <div class="container">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome prodotto</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') }}" id="name" aria-describedby="nameHelp">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <input type="text" name="description" class="form-control @error('description') is-invalid @enderror"
                    value="{{ old('description') }}" id="title" aria-describedby="descriptionHelp">
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input type="text" name="price" class="form-control @error('price') is-invalid @enderror"
                    value="{{ old('price') }}" id="price" aria-describedby="priceHelp">
                @error('price')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="size" class="form-label">Misura</label>
                <input type="text" name="size" class="form-control @error('size') is-invalid @enderror"
                    value="{{ old('size') }}" id="size" aria-describedby="sizeHelp">
                @error('size')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="color" class="form-label">Colore</label>
                <input type="text" name="color" class="form-control @error('color') is-invalid @enderror"
                    value="{{ old('color') }}" id="color" aria-describedby="colorHelp">
                @error('color')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="categories" class="form-label">Categoria</label>
                <div class="@error('categories') is-invalid @enderror">
                    @foreach ($categories as $cat)
                        <div class=form-check>
                            <input name="categories[]" class="form-check-input" type="checkbox" value="{{ $cat->id }}"
                                id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                {{ $cat->name }}
                            </label>
                        </div>
                    @endforeach()
                </div>
                @error('categories')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="thumbnail" class="form-label">IMG 1</label>
                <input type="file" name="thumbnail" class="form-control  @error('thumbnail') is-invalid @enderror"
                    id="thumbnail" aria-describedby="thumbnailHelp" value="{{ old('thumbnail') }}">
                @error('thumbnail')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="thumbnail_s" class="form-label">IMG 2</label>
                <input type="file" name="thumbnail_s" class="form-control  @error('thumbnail_s') is-invalid @enderror"
                    id="thumbnail_s" aria-describedby="thumbnail_sHelp" value="{{ old('thumbnail_s') }}">
                @error('thumbnail_s')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">CREA</button>
        </form>
    </div>
@endsection
