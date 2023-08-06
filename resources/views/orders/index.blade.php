{{-- @extends('layouts.app-admin')
@section('content')
    <h1>Index</h1>

    @forelse ($orders as $product)
        <a href="{{ route('orders.show', $product) }}">
            <p>{{ $product->name }}</p>
        </a>
        <form action="{{ route('orders.destroy', $product) }}" method="POST">
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
                <h1 class="me-auto">Ordini evasi</h1>
            @else
                <h1 class="me-auto">Ordini ricevuti</h1>
            @endif
            <div>
                @if (request('trashed'))
                    <a class="btn btn-sm btn-light" href="{{ route('orders.index') }}">Ordini ricevuti</a>
                @else
                    <a class="btn btn-sm btn-light" href="{{ route('orders.index', ['trashed' => true]) }}">
                        Ordini evasi({{ $num_of_trashed }})
                    </a>
                @endif
                {{-- <a class="btn btn-sm btn-primary" href="{{ route('orders.create') }}">Nuovo post</a> --}}
            </div>
        </div>
    </div>
    <div class="container">
        <table class="table table-striped table-inverse table-responsive">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Data creazione</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($orders as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                            <a href="{{ route('orders.show', $product) }}">{{ $product->name }}</a>
                        </td>
                        <td>{{ $product->created_at->format('d/m/Y') }}</td>
                        <td>
                            <div class="d-flex ">
                                {{-- <a class="btn btn-sm btn-secondary" href="{{ route('orders.edit', $product) }}">Edit</a> --}}
                                <form action="{{ route('orders.destroy', $product) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input class="btn btn-sm btn-danger" type="submit" value="Ordine completato">
                                </form>
                                @if ($product->trashed())
                                    <form action="{{ route('orders.restore', $product) }}" method="POST">
                                        @csrf
                                        <input class="btn btn-sm btn-success" type="submit" value="Ripristina">
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th colspan="6">Nessun ordine trovato</th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
