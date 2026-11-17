@extends('layouts.fo')

@section('content')

<h1>Adicionar uma Tarefa</h1>

<form method="POST" action="{{route('tasks.store')}}">
    @csrf
<div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome da Tarefa</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        {{-- @error('name')
            <p>Nome inválido</p>
        @enderror --}}
<div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Status</label>
            <input type="text" name="status" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        {{-- @error('email')
            <p>email inválido</p>
        @enderror --}}

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Data de Conclusão</label>
            <input type="date" name="due_at" class="form-control" id="exampleInputPassword1">
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
        <button type="submit" class="btn btn-primary">Enviar</button>
</form>

        @endsection
