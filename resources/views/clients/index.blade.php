@extends('layouts.admin')
@section('content')

<div class="main-wrapper ">
	<section class="section intro">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-12 text-center">
					<div class="section-title">
						<h1 class="mt-3 content-title">Clientes</h1>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-12">
					<a class="btn btn-primary btn-small" href="{{ route('clients.create') }}">
						<i class="fas fa-plus"></i>
						Novo cliente
					</a>
				</div>
			</div>
			<br>
			<table class="table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<th>Nome</th>
						<th>Email</th>
						<th>Endereço</th>
						<th>Cidade</th>
						<th>Estado</th>
						<th>Operações</th>
					</tr>
				</thead>
				<tbody>
					@foreach($clients as $client)
					<tr>
						<td class="align-middle">
							<a href="{{ route('clients.show', ['client' => $client->id]) }}">
								{{ $client->name }}
							</a>
						</td>
						<td class="align-middle">{{ $client->email }}</td>
						<td class="align-middle">{{ $client->street }}, {{ $client->number }}, {{ $client->address }}</td>
						<td class="align-middle">{{ $client->city }}</td>
						<td class="align-middle">{{ $client->state }}</td>
						<td class="align-middle">
							<a class="btn btn-transparent" href="{{ route('clients.edit', ['client' => $client->id]) }}">
								<i class="fas fa-pencil-alt"></i>
								Editar
							</a>
							<form action="{{ route('clients.destroy', ['client' => $client->id]) }}" method="post" id="exclusao">
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