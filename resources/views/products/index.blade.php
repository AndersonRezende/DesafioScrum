@extends('layouts.admin')
@section('content')

<div class="main-wrapper ">
	<section class="section intro">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-12 text-center">
					<div class="section-title">
						<h1 class="mt-3 content-title">Produtos</h1>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-12">
					<a class="btn btn-primary btn-small" href="{{ route('products.create') }}">
						<i class="fas fa-plus"></i>
						Novo produto
					</a>
				</div>
			</div>
			<br>
			<table class="table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<th>Nome</th>
						<th>Descrição</th>
						<th>Quantidade</th>
						<th>Valor</th>
						<th>Operações</th>
					</tr>
				</thead>
				<tbody>
					@foreach($products as $product)
					<tr>
						<td class="align-middle">
							<a href="{{ route('products.show', ['product' => $product->id]) }}">
								{{ $product->name }}
							</a>
						</td>
						<td class="align-middle">{{ $product->description }}</td>
						<td class="align-middle">{{ $product->amount }}</td>
						<td class="align-middle">R$ {{ $product->value }}</td>
						<td class="align-middle">
							<a class="btn btn-transparent" href="{{ route('products.edit', ['product' => $product->id]) }}">
								<i class="fas fa-pencil-alt"></i>
								Editar
							</a>
							<form action="{{ route('products.destroy', ['product' => $product->id]) }}" method="post" id="exclusao">
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