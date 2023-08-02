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
               <div class="col col-md-6"><b>Tarefas</b></div>
               <div class="col col-md-6">
                    <a href="{{ route('tarefas.create') }}" class="btn btn-success btn-sm float-end">Adicionar</a>
               </div>
          </div>
     </div>
     <div class="card-body">
          <div class="row mb-3">
               <div class="col col-md-3">
                    <label for="search">Buscar:</label>
                    <input id="search" type="text" class="form-control" placeholder="Digite o termo de busca">
               </div>
               <div class="col col-md-3">
                    <label> </label>
                    <button id="btn-search" class="btn btn-primary">Buscar</button>
               </div>
          </div>

          <div class="row mb-3">
               <div class="col col-md-3">
                    <label for="status">Status:</label>
                    <select id="status" class="form-control">
                         <option value="">Todos</option>
                         <option value="Concluido">Concluído</option>
                         <option value="Nao Concluido">Não Concluído</option>
                    </select>
               </div>
               <div class="col col-md-3">
                    <label for="prioridade">Prioridade:</label>
                    <select id="prioridade" class="form-control">
                         <option value="">Todas</option>
                         <option value="Alta">Alta</option>
                         <option value="Media">Média</option>
                         <option value="Baixa">Baixa</option>
                    </select>
               </div>
               <div class="col col-md-3">
                    <label></label>
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
                    <td data-title="Título">{{ $row->tarefa_titulo }}</td>
                    <td data-title="Descrição">{{ $row->tarefa_descricao }}</td>
                    <td data-title="Status">{{ $row->tarefa_status }}</td>
                    <td data-title="Data de Conclusão">{{ $row->tarefa_data }}</td>
                    <td data-title="Prioridade">{{ $row->tarefa_prioridade }}</td>
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
               @section('js')
               <script>
                    $(document).ready(function() {
                         $('#btn-search').click(function() {
                              var searchTerm = $('#search').val().toLowerCase();
                              $('#tarefas-table tbody tr').each(function() {
                                   var title = $(this).find('td[data-title="Título"]').text().toLowerCase();
                                   var description = $(this).find('td[data-title="Descrição"]').text().toLowerCase();
                                   if (title.includes(searchTerm) || description.includes(searchTerm)) {
                                        $(this).show();
                                   } else {
                                        $(this).hide();
                                   }
                              });
                         });

                         $('#btn-filter').click(function() {
                              var statusFilter = $('#status').val();
                              var prioridadeFilter = $('#prioridade').val();
                              $('#tarefas-table tbody tr').each(function() {
                                   var status = $(this).find('td[data-title="Status"]').text();
                                   var prioridade = $(this).find('td[data-title="Prioridade"]').text();

                                   var statusMatch = (statusFilter === '' || status === statusFilter);
                                   var prioridadeMatch = (prioridadeFilter === '' || prioridade === prioridadeFilter);

                                   if (statusMatch && prioridadeMatch) {
                                        $(this).show();
                                   } else {
                                        $(this).hide();
                                   }
                              });
                         });
                    });
               </script>
               @endsection

               @section('js')
               <!-- Inclua outros scripts adicionais aqui -->
               <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
               <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
               <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap5.min.js"></script>
               @endsection
               @endforeach
               @else
               <tr>
                    <td colspan="5" class="text-center">Arquivo não encontrado.</td>
               </tr>
               @endif
          </table>
          @endsection