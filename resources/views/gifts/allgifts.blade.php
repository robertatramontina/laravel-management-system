@extends('layouts.fo')

@section('content')
    <br>
    <h3>Prendas de Natal</h3>
    <br>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('gifts.add') }}" class="btn btn-success">
            + Adicionar prenda
        </a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome da prenda</th>
                <th scope="col">Custo estimado</th>
                <th scope="col">Utilizador</th>
                <th scope="col">Custo efetivo</th>
                <th scope="col">Diferença de custos</th>
                <th scope="col">Ações</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($gifts as $gift)
                <tr>
                    <th scope="row">{{ $gift->name }}</th>
                    <td>{{ number_format($gift->expected_cost, 2, ',', '.') }} €</td>
                    <td>{{ $gift->user_name }}</td>
                    <td>
                        @if ($gift->actual_cost !== null)
                            {{ number_format($gift->actual_cost, 2, ',', '.') }} €
                        @else
                            Valor ainda não registado
                        @endif
                    </td>
                    <td>
                        @if ($gift->actual_cost !== null)
                            <span
                                class="
                            {{ $gift->cost_difference > 0
                                ? 'text-success'
                                : ($gift->cost_difference < 0
                                    ? 'text-danger'
                                    : 'text-secondary') }}
                            fw-bold">
                                {{ number_format($gift->cost_difference, 2, ',', '.') }} €
                            </span>
                        @else
                            <span class="text-muted">
                                Valor ainda não registado
                            </span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('gifts.edit', $gift->id) }}" class="btn btn-info">Editar</a>
                        <a href="{{ route('gifts.delete', $gift->id) }}" class="btn btn-danger">Apagar</a>
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
@endsection
