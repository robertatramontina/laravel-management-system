@extends('layouts.fo')

@section('content')
    <h1>Adicionar um utilizador</h1>

    <form method="POST" action="{{ route('users.store') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">

            @error('name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">

            @error('email')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">
                Morada (opcional)
            </label>
            <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}">

            @error('address')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="nif" class="form-label">NIF</label>
            <input type="text" name="nif" id="nif" class="form-control" value="{{ old('nif') }}"
                maxlength="9" required>

            @error('nif')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Palavra-passe</label>
            <input type="password" name="password" id="password" class="form-control">

            @error('password')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">
            Adicionar utilizador
        </button>

        <a href="{{ route('users.all') }}" class="btn btn-secondary">
            Cancelar
        </a>

    </form>
@endsection
