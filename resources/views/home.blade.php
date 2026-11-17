@extends('layouts.fo')

@section('content')
    <div class="py-4">

        <div class="p-5 rounded-3 mb-4" style="background-color: #174D3A; color: white;">

            <h1>Sistema de Gestão</h1>

            <p class="mb-0">
                Aplicação desenvolvida em Laravel e MySQL
                para gerir utilizadores, tarefas e prendas de Natal.
            </p>
        </div>

        <div class="row g-4">

            {{-- Utilizadores --}}
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body d-flex flex-column">

                        <h4 class="card-title">Utilizadores</h4>

                        <p class="card-text">
                            Registo, consulta, edição e gestão
                            dos utilizadores da aplicação.
                        </p>

                        <a href="{{ route('users.all') }}" class="btn btn-success mt-auto">
                            Ver utilizadores
                        </a>

                    </div>
                </div>
            </div>

            {{-- Tarefas --}}
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body d-flex flex-column">

                        <h4 class="card-title">Tarefas</h4>

                        <p class="card-text">
                            Organização de tarefas com estados,
                            datas e utilizadores responsáveis.
                        </p>

                        <a href="{{ route('tasks.all') }}" class="btn btn-success mt-auto">
                            Ver tarefas
                        </a>

                    </div>
                </div>
            </div>

            {{-- Prendas de Natal --}}
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body d-flex flex-column">

                        <h4 class="card-title">Prendas de Natal</h4>

                        <p class="card-text">
                            Gestão de prendas com custos estimados,
                            custos efetivos e cálculo da diferença.
                        </p>

                        <a href="{{ route('gifts.all') }}" class="btn btn-success mt-auto">
                            Ver prendas
                        </a>

                    </div>
                </div>
            </div>

        </div>

        <div class="text-center mt-5 text-muted">
            <p>
                Projeto académico desenvolvido com
                Laravel, PHP, MySQL e Bootstrap.
            </p>
        </div>

    </div>
@endsection
