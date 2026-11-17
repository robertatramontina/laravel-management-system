@extends('layouts.fo')

@section('content')
    <br>
    <h5>Detalhes do User {{ $userInfo->name }}</h5>
    <br>
    <p>E-mail: {{ $userInfo->email }}</p>
    <p>Número interno: {{ $userInfo->id }}</p>
    <p>Morada: {{ $userInfo->address }}</p>
    <p>NIF: {{ $userInfo->nif }}</p>
@endsection
