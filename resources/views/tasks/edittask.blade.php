@extends('layouts.fo')

@section('content')
    <h4>Mostrar dados da tarefa</h4>
    <br>
    <h5>Tarefas do User {{ $taskInfo->user_name }}</h5>
    <br>
    <p>Nome da tarefa: {{ $taskInfo->name }}</p>
    <p>Descrição: {{ $taskInfo->description }}</p>
    <p>Status: {{ $taskInfo->status }}</p>
@endsection
