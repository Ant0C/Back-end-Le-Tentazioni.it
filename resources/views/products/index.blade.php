{{-- @extends('layouts.app-admin')
@section('content')
    <h1>Index</h1>

    @forelse ($products as $product)
        <a href="{{ route('products.show', $product) }}">
            <p>{{ $product->name }}</p>
        </a>
        <form action="{{ route('products.destroy', $product) }}" method="POST">
            @csrf
            @method('DELETE')
            <input class="btn btn-sm btn-danger" type="submit" value="Elimina">
        </form>
    @empty
        <p>Nessun prodotto presente</p>
    @endforelse
@endsection --}}

@extends('layouts.app-admin')

@section('content')
    @if (request()->session()->exists('message'))
        <div class="alert alert-primary" role="alert">
            {{ request()->session()->pull('message') }}
        </div>
    @endif
    <div class="container py-5">
        <div class="d-flex align-items-center">
            @if (request('trashed'))
                <h1 class="me-auto">Cestino</h1>
            @else
                <h1 class="me-auto">Tutti i Prodotti</h1>
            @endif
            <div>
                @if (request('trashed'))
                    <a class="btn btn-sm btn-light" href="{{ route('products.index') }}">Tutti i prodotti</a>
                @else
                    <a class="btn btn-sm btn-light" href="{{ route('products.index', ['trashed' => true]) }}">
                        Cestino({{ $num_of_trashed }})
                    </a>
                @endif
                <a class="btn btn-sm btn-primary" href="{{ route('products.create') }}">Nuovo post</a>
            </div>
        </div>
    </div>
    <div class="container">
        <table class="table table-striped table-inverse table-responsive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Slug</th>
                    <th>Data creazione</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                            <a href="{{ route('products.show', $product) }}">{{ $product->name }}</a>
                        </td>
                        <td>{{ $product->slug }}</td>
                        <td>{{ $product->created_at->format('d/m/Y') }}</td>
                        <td>
                            <div class="d-flex ">
                                <a class="btn btn-sm btn-secondary" href="{{ route('products.edit', $product) }}">Edit</a>
                                <form action="{{ route('products.destroy', $product) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-sm btn-danger" type="submit" value="Elimina">
                                </form>
                                @if ($product->trashed())
                                    <form action="{{ route('products.restore', $product) }}" method="POST">
                                        @csrf
                                        <input class="btn btn-sm btn-success" type="submit" value="Ripristina">
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th colspan="6">Nessun prodotto trovato</th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
