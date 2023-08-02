@extends ('layouts.app')
@section('content')
<h1>Detalhes do Produto</h1>
<p><strong>ID: </strong> {{ $product->id }}</p>
<p><strong>Nome:</strong> {{ $product->name }}</p>
<p><strong>Preço:</strong> {{ $product->price }}</p>
<p><strong>Descrição:</strong> {{ $product->description }}</p>
<a href="{{ route('products.index') }}" class="btn btn-primary">Voltar para a lista</a>
@endsection