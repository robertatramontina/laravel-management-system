@extends('layouts.fo')

@section('content')
    <form action="{{ route('gifts.update', $giftInfo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nome da prenda:</label>
            <input type="text" name="name" class="form-control" value="{{ $giftInfo->name }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Custo estimado:</label>
            <input type="number" step="0.01" name="expected_cost" class="form-control"
                value="{{ $giftInfo->expected_cost }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Utilizador:</label>
            <select name="user_id" id="user_id" class="form-select">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $giftInfo->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Custo efetivo:</label>
            <input type="number" step="0.01" name="actual_cost" class="form-control"
                value="{{ $giftInfo->actual_cost }}">
        </div>

        <button type="submit" class="btn btn-success">
            Guardar alterações
        </button>

        <a href="{{ route('gifts.all') }}" class="btn btn-secondary">
            Cancelar
        </a>

    </form>
@endsection
