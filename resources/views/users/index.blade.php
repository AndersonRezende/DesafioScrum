@extends('layouts.admin')
@section('content')

<div class="main-wrapper ">
	<section class="section intro">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-12 text-center">
					<div class="section-title">
						<h1 class="mt-3 content-title">Usuários</h1>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-12">
					<a class="btn btn-primary btn-small" href="{{ route('users.create') }}">
						<i class="fas fa-plus"></i>
						Novo usuário
					</a>
				</div>
			</div>
			<br>
			<table class="table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<th>Nome</th>
						<th>Email</th>
						<th>Nível de Acesso</th>
						<th>Operações</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
					<tr>
						<td class="align-middle">{{ $user->name }}</td>
						<td class="align-middle">{{ $user->email }}</td>
						<td class="align-middle">{{ $user->level->description }}</td>
						<td class="align-middle">
							<a class="btn btn-transparent" href="{{ route('users.edit', ['user' => $user->id]) }}">
								<i class="fas fa-pencil-alt"></i>
								Editar
							</a>
							<form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="post" id="exclusao">
								@csrf
								@method('delete')
								<button class="btn btn-transparent" type="submit" value="Remover" onclick="return confirm('Quer deletar esse registro?')">
									<i class="fas fa-trash"></i>
									Deletar
								</button>
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</section>
</div>
@stop