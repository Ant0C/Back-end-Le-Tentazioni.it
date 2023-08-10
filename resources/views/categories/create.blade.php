@extends('layouts.app-admin')

@section('content')
    <div class="container py-5">
        <h1>Nuova categoria</h1>
    </div>
    <div class="container">
        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') }}" id="name" aria-describedby="nameHelp">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">CREA</button>
        </form>
    </div>
@endsection
