@extends('layouts.admin')
@section('content')
<h1>Novo Usuário</h1>
<form method="post" action="{{ route('users.store') }}">
	@csrf

	<div class="form-group">
		<label for="name">Nome</label>
		<input name="name" type="text" class="form-control" placeholder="Nome do usuário" autofocus required value="{{ old('name') }}">							
	</div>
	
	<div class="form-group">
		<label for="level">Nível de Acesso</label>
		<select name="level" class="form-control" required>
			@foreach($levels as $level)
			<option value="{{ $level->id }}">{{ $level->description }}</option>
			@endforeach				
		</select>
	</div>

	<div class="form-group">
		<label for="email">E-mail</label>
		<input name="email" type="email" class="form-control" placeholder="E-mail do usuário" autofocus required value="{{ old('email') }}">							
	</div>

	<div class="form-group">
		<label for="password">Senha</label>
		<input name="password" type="password" class="form-control" placeholder="Senha do usuário" autofocus required>							
	</div>

	<div class="form-group">
		<label for="password_confirmation">Confirmação de Senha</label>
		<input name="password_confirmation" type="password" class="form-control" placeholder="Confirme a senha do usuário" autofocus required>
	</div>

	<button name="submit" type="submit" class="btn btn-primary" value="ok">Salvar</button>
</form>
@stop