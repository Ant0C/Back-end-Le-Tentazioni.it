@extends('layouts.app-admin')
@section('content')
    <h1>Show</h1>

    <h1>{{ $product->name }}</h1>
    <a class="btn btn-sm btn-secondary" href="{{ route('products.edit', $product) }}">Modifica</a>
@endsection
