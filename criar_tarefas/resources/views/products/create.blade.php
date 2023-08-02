@extends ('layouts.app')
@section('content')
<h1>Criar Novo Produto</h1>
<form action="{{ route('products.store') }}" method="POST">
@csrf
<div class="form-group">
<label for="name">Nome do Produto</label>
<input type="text" name="name" id="name" class="form-control" required>
</div>
<div class="form-group">
<label for="price">Preço</label>
<input type="number" name="price" id="price" class="form-control" step="0.01" required>
</div>
<div class="form-group">
<label for="description">Descrição</label>
<textarea name="description" id="description" class="form-control" rows="4"></textarea>
</div>
<button type="submit" class="btn btn-primary">Criar Produto</button>
</form>
@endsection