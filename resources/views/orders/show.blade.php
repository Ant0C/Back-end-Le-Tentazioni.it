{{-- @extends('layouts.app-admin')
@section('content')
    <h1>Show</h1>

    <h1>{{ $order->name }}</h1>
    <a class="btn btn-sm btn-secondary" href="{{ route('orders.edit', $order) }}">Modifica</a>
    <form action="{{ route('orders.destroy', $order) }}">
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
                    <div class="container_order">
                        <img src="{{ asset('storage/' . $order->cover_image) }}" alt="" class="img">
                        <img src="{{ asset('storage/' . $order->cover_image_s) }}" alt="" class="overlay">
                        <div class="text">
                            <p>{{ $order->name }}</p>
                            <span class="price">{{ $order->price }} €</span>
                            <p>{{ $order->description }}</p>
                        </div>
                        <div>
                            @forelse($order->categories as $category)
                                <span class="badge rounded-pill text-bg-warning">{{ $category->name }}</span>
                            @empty
                                -
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex">
            <a class="btn btn-sm btn-secondary" href="{{ route('orders.edit', $order) }}">Modifica</a>
            @if ($order->trashed())
                <form action="{{ route('orders.restore', $order) }}" method="order">
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

    .container_order {
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

    .container_order:hover .overlay {
        opacity: 1;
    }
</style>
