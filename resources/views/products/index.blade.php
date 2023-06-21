@extends('layouts.app')
@section('content')
    <h1>Index</h1>

    @forelse ($products as $product)
        <p>{{ $product->name }}</p>
    @empty
    @endforelse
@endsection
