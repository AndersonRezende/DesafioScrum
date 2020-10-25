@extends('layouts.admin')
@section('content')
<h1>Editar Produto</h1>
<form method="post" action="{{ route('products.update', ['product' => $product->id]) }}" enctype="multipart/form-data">
	@csrf
	@method('PUT')

	<div class="form-group">
		<label for="name">Nome</label>
		<input name="name" type="text" class="form-control"  autofocus required value="{{ $product->name }}">				
	</div>

	<div class="form-group">
		<label for="description">Descrição</label>
		<input name="description" type="text" class="form-control"  autofocus required value="{{ $product->description }}">
	</div>

	<div class="form-group">
		<label for="amount">Estoque</label>
		<input name="amount" type="number" class="form-control"  autofocus required value="{{ $product->amount }}">
	</div>

	<div class="form-group">
		<label for="value">Valor</label>
		<input name="value" type="text" class="form-control"  autofocus required value="{{ $product->value }}">
	</div>

	<div class="form-group">
		<label for="value">Valor</label>
		<input type="file" class="form-control @error('file') is-invalid @enderror" id="fileitems" name="fileitems[]" required autofocus multiple>
	</div>

	<button name="submit" type="submit" class="btn btn-primary" value="ok">Salvar</button>
</form>
@stop