@extends ('layouts.app')
@section('content')
<h1>Editar Produto</h1>
<form action="{{ route('products.update', $product->id) }}" method="POST">
@csrf
@method('PUT')
<div class="form-group"> <label for="name">Nome do Produto</label> <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required> <div class="form-group"> <input type="number" name="price" id="price" class="form-control" value="{{ $product->price }}" step="0.01" required> <button type="submit" class="btn btn-primary">Atualizar Produto</button>
</div>
<label for="price">Preço</label>
</div>
<div class="form-group">
<label for="description">Descrição</label>
<textarea name="description" id="description" class="form-control" rows="4">{{ $product->description }}</textarea>
</div>
</form>
@endsection