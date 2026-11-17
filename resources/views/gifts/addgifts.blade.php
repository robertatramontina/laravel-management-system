@extends('layouts.fo')

@section('content')
    <br>
    <h2>Prendas de Natal</h2>
    <br>

    <form method="POST" action="{{ route('gifts.store') }}">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome da prenda</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        @error('name')
            <p>Adicionar o nome da prenda</p>
        @enderror
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Custo estimado</label>
            <input type="number" name="expected_cost" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">

        </div>
        @error('expected_cost')
            <p class="text-danger">O custo estimado é obrigatório.</p>
        @enderror

        <div class="mb-3">
            <label for="actual_cost" class="form-label">Custo efetivo</label>
            <input type="number" name="actual_cost" class="form-control" id="actual_cost" step="0.01" min="0">
        </div>

        <div class="mb-3">
            <label for="user_id" class="form-label">Utilizador</label>

            <select name="user_id" id="user_id" class="form-select">
                <option value="">Selecione um utilizador</option>

                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        {{-- @error('password')
            <p>password inválida</p>
        @enderror --}}
        <button type="submit" class="btn btn-success">Adicionar prenda</button>
    </form>
@endsection
