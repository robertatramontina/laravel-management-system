@extends('layouts.fo')

@section('content')
    <h1>Aqui vamos carregar todos os utilizadores!</h1>

    <h6>Users sem estarem carregados da base de dados</h6>
    <ul>
        @foreach ($usersWDB as $user)
            <li>{{ $user['name'] }} --> {{ $user['email'] }}</li>
        @endforeach

    </ul>

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                {{-- <th scope="col">Address</th>
                <th scope="col">NIF</th> --}}
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usersFromDB as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    {{-- <td>{{ $user->address }}</td>
                    <td>{{ $user->nif }}</td> --}}
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">Ver / Editar</a>
                        <a href="{{ route('users.delete', $user->id) }}" class="btn btn-danger">Apagar</a>
                    </td>
                </tr>
            @endforeach

            </tr>
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('users.add') }}" class="btn btn-success">
                    + Adicionar utilizador
                </a>
            </div>
        </tbody>
    </table>
@endsection
