@extends('adminlte::page')
@section('content')

 <div class="card">
    <div class="card-header">Editar Tarefa</div>
    <div class="card-body">
        <form method="post" action="{{ route('tarefas.update', $tarefa->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Nome da Tarefa</label>
                <div class="col-sm-10">
                    <input type="text" name="tarefa_titulo" class="form-control" value="{{ $tarefa->tarefa_titulo }}" />
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-label-form">Descricao da Tarefa</label>
                <div class="col-sm-10">
                    <input type="text" name="tarefa_descricao" class="form-control" value="{{ $tarefa->tarefa_descricao }}" />
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
                    <input type="date" name="tarefa_data" class="form-control" value="{{ $tarefa->tarefa_data }}" />
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
                <input type="hidden" name="hidden_id" value="{{ $tarefa->id }}" />
                <input type="submit" class="btn btn-primary" value="Edit" />
            </div>

        </form>
    </div>
</div>
<script>
    document.getElementsByName('tarefa_prioridade')[0].value = "{{ $tarefa->tarefa_prioridade }}";
</script>

 @endsection('content')