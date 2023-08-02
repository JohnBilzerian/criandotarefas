@extends('adminlte::page')
@section('content')
@if($errors->any())

<div class="alert alert-danger">

    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>

</div>

@endif

<div class="card">
    <div class="card-header">Add Tarefa</div>
    <div class="card-body">
        <form method="post" action="{{ route('tarefas.store') }}" enctype="multipart/form-data">

            @csrf

            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Nome da Tarefa</label>
                <div class="col-sm-10">
                    <input type="text" name="tarefa_titulo" class="form-control" />
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Descricao da Tarefa</label>
                <div class="col-sm-10">
                    <input type="text" name="tarefa_descricao" class="form-control" />
                </div>
            </div>

            <div class="row mb-4">
                <label class="col-sm-2 col-label-form">Status</label>
                <div class="col-sm-10">
                    <select name="tarefa_status" class="form-control">
                        <option value="Concluido">Concluído</option>
                        <option value="Nao Concluido">Não Concluído</option>
                    </select>
                </div>
            </div>

            <div class="row mb-4">
                <label class="col-sm-2 col-label-form">Data de Conclusão</label>
                <div class="col-sm-10">
                    <input type="date" name="tarefa_data" class="form-control" />
                </div>
            </div>

            <div class="row mb-4">
                <label class="col-sm-2 col-label-form">Prioridade</label>
                <div class="col-sm-10">
                    <select name="tarefa_prioridade" class="form-control">
                        <option value="Alta">Alta</option>
                        <option value="Media">Media</option>
                        <option value="Baixa">Baixa</option>
                    </select>
                </div>
            </div>

            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Add" />
            </div>

        </form>
    </div>
</div>

@endsection('content')