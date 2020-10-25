@extends('layouts.admin')
@section('content')
<h1>Editar Cliente</h1>
<form method="post" action="{{ route('clients.update', ['client' => $client->id]) }}">
	@csrf
	@method('PUT')

	<div class="form-group">
		<label for="name">Nome</label>
		<input name="name" type="text" class="form-control"  autofocus required value="{{ $client->name }}">				
	</div>

	<div class="form-group">
		<label for="address">Bairro</label>
		<input name="address" type="text" class="form-control"  autofocus required value="{{ $client->address }}">
	</div>

	<div class="form-group">
		<label for="street">Rua</label>
		<input name="street" type="text" class="form-control"  autofocus required value="{{ $client->street }}">
	</div>

	<div class="form-group">
		<label for="number">Número</label>
		<input name="number" type="text" class="form-control"  autofocus required value="{{ $client->number }}">
	</div>

	<div class="form-group">
		<label for="city">Cidade</label>
		<input name="city" type="text" class="form-control"  autofocus required value="{{ $client->city }}">
	</div>

	<div class="form-group">
		<label for="state">Estado</label>
		<input name="state" type="text" class="form-control"  autofocus required value="{{ $client->state }}">
	</div>

	<div class="form-group">
		<label for="email">E-mail</label>
		<input name="email" type="email" class="form-control" cliente" autofocus required value="{{ $client->email }}">
	</div>

	<div class="form-group">
		<label for="password">Senha</label>
		<input name="password" type="password" class="form-control"  autofocus required>							
	</div>

	<button name="submit" type="submit" class="btn btn-primary" value="ok">Salvar</button>
</form>
@stop