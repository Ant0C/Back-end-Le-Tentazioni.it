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
                <h1 class="me-auto">Tutte le categorie</h1>
            @endif
            <div>
                @if (request('trashed'))
                    <a class="btn btn-sm btn-light" href="{{ route('products.index') }}">Tutte le categorie</a>
                @else
                    <a class="btn btn-sm btn-light" href="{{ route('products.index', ['trashed' => true]) }}">
                        Cestino({{ $num_of_trashed }})
                    </a>
                @endif
                <a class="btn btn-sm btn-primary" href="{{ route('products.create') }}">Nuova categoria</a>
            </div>
        </div>
    </div>
    <div class="container">
        <table class="table table-striped table-inverse table-responsive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>
                            <a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a>
                        </td>
                        <td>
                            <div class="d-flex ">
                                <a class="btn btn-sm btn-secondary"
                                    href="{{ route('categories.edit', $category) }}">Edit</a>
                                <form action="{{ route('categories.destroy', $category) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-sm btn-danger" type="submit" value="Elimina">
                                </form>
                                @if ($category->trashed())
                                    <form action="{{ route('categories.restore', $category) }}" method="POST">
                                        @csrf
                                        <input class="btn btn-sm btn-success" type="submit" value="Ripristina">
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th colspan="6">Nessuna categoria trovata</th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
