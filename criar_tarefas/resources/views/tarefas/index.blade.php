@extends('adminlte::page')
@section('content')
@if($message = Session::get('success'))
<div class="alert alert-success">
     {{ $message }}
</div>
@endif
<div class="card">
     <div class="card-header">
          <div class="row">
               <div class="col col-md-6"><b>Tarefa Data</b></div>
               <div class="col col-md-6">
                    <a href="{{ route('tarefas.create') }}" class="btn btn-success btn-sm float-end">Adicionar</a>
               </div>
          </div>
     </div>
     <div class="card-body">
          <div class="row mb-3">
               <div class="col col-md-3">
                    <label for="status">Status:</label>
                    <select id="status" class="form-control">
                         <option value="">Todos</option>
                         <option value="Concluido">Concluido</option>
                         <option value="Nao Concluido">Pendente</option>
                    </select>
               </div>
               <div class="col col-md-3">
                    <label for="prioridade">Prioridade :</label>
                    <select id="prioridade" class="form-control">
                         <option value="">Todas</option>
                         <option value="Alta">Alta</option>
                         <option value="Media">Média</option>
                         <option value="Baixa">Baixa</option>
                    </select>
               </div>
               <div class="col col-md-3">
                    <label> </label>
                    <button id="btn-filter" class="btn btn-primary">Filtrar</button>
               </div>
          </div>
          <table id="tarefas-table" class="table table-bordered">
               <tr>
                    <th>Título</th>
                    <th>Descrição</th>
                    <th>Status</th>
                    <th>Data de Conclusão</th>
                    <th>Prioridade</th>
                    <th>Ação</th>
               </tr>
               @if(count($data) > 0)
               @foreach($data as $row)
               <tr>
                    <td>{{ $row->tarefa_titulo }}</td>
                    <td>{{ $row->tarefa_descricao }}</td>
                    <td>{{ $row->tarefa_status }}</td>
                    <td>{{ $row->tarefa_data }}</td>
                    <td>{{ $row->tarefa_prioridade }}</td>
                    <td>
                         <form method="post" action="{{ route('tarefas.destroy', $row->id) }}">
                              @csrf
                              @method('DELETE')
                              <a href="{{ route('tarefas.show', $row->id) }}" class="btn btn-primary btn-sm">Visualizar</a>
                              <a href="{{ route('tarefas.edit', $row->id) }}" class="btn btn-warning btn-sm">Editar</a>
                              <input type="submit" class="btn btn-danger btn-sm" value="Delete" />
                         </form>
                    </td>
               </tr>
               @endforeach
               @else
               <tr>
                    <td colspan="5" class="text-center">Arquivo não encontrado.</td>
               </tr>
               @endif
          </table>
          @endsection