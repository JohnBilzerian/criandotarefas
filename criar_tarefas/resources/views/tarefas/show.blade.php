@extends('adminlte::page')
@section('content')

 <div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col col-md-6"><b>Tarefa Detalhes</b></div>
            <div class="col col-md-6">
                <a href="{{ route('tarefas.index') }}" class="btn btn-primary btn-sm float-end">Visualizar tudo.</a>
            </div>
        </div>
    </div>

    <div class="card-body">
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Nome da Tarefa</b></label>
            <div class="col-sm-10">
                {{ $tarefa->tarefa_titulo }}
            </div>
        </div>
        
        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Descricao da Tarefa</b></label>
            <div class="col-sm-10">
                {{ $tarefa->tarefa_descricao }}
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Status</b></label>
            <div class="col-sm-10">
                {{ $tarefa->tarefa_status }}
            </div>
        </div>

        <div class="row mb-4">
            <label class="col-sm-2 col-label-form"><b>Data de Conclusão</b></label>
            <div class="col-sm-10">
                {{ $tarefa->tarefa_data }}
            </div>
        </div>

        <div class="row mb-3">
            <label class="col-sm-2 col-label-form"><b>Prioridade</b></label>
            <div class="col-sm-10">
                {{ $tarefa->tarefa_prioridade }}
            </div>
        </div>

    </div>
</div>

@endsection('content')