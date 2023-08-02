@extends ('layouts.app')
@section('content') <h1>Lista de Produtos</h1>
<a href="{{ route('products.create') }}" class="btn btn-primary mb-2">Novo Produto</a>
<table class="table">
<thead>
<tr>
<th>ID</th>
<th>Nome</th>
<th>Preço</th>
<th>Descrição</th>
<th>Ações</th>
</tr>
</thead>
<tbody>
@foreach ($products as $product)
<tr>
<td>{{ $product->id }}</td>
<td>{{ $product->name }}</td>
<td>{{ $product->price }}</td>
<td>{{ $product->description }}</td>
<td>
<a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">Detalhes</a>
<a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">Editar</a>
<form action="{{ route('products.destroy', $product->id) }}" method="POST"
style="display: inline-block;">
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger btn-sm">Excluir</button>
</form>
</td>
</tr>
@endforeach
</tbody>
</table>
@endsection