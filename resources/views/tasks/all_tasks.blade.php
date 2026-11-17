@extends('layouts.fo')

@section('content')
    <br>
    <h3>Todas as Tarefas</h3>
    <br>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome da tarefa</th>
                <th scope="col">Status</th>
                <th scope="col">Data de conclusão</th>
                <th scope="col">Designada para</th>
                <th scope="col">Ações</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($tasksFromDB as $task)
                <tr>
                    <th scope="row">{{ $task->name }}</th>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->due_at }}</td>
                    <td>{{ $task->user_name }}</td>
                    <td>
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-info">Editar</a>
                        <a href="{{ route('tasks.delete', $task->id) }}" class="btn btn-danger">Apagar</a>
                    </td>
                </tr>
            @endforeach

            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('tasks.add') }}" class="btn btn-success">
                    + Adicionar tarefa
                </a>
            </div>

        </tbody>
    </table>
@endsection
