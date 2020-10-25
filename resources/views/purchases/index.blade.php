@extends('layouts.admin')
@section('content')

<div class="main-wrapper ">
	<section class="section intro">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-12 text-center">
					<div class="section-title">
						<h1 class="mt-3 content-title">Compras</h1>
					</div>
				</div>
			</div>
			<br>
			<table class="table table-bordered table-striped table-hover">
				<thead>
					<tr>
						<th>Cliente</th>
						<th>Produto</th>
						<th>Valor</th>
						<th>Endereço de entrega</th>
						<th>Ver detalhes</th>
					</tr>
				</thead>
				<tbody>
					@foreach($purchases as $purchase)
					<tr>
						<td class="align-middle">{{ $purchase->client->name }}</td>
						<td class="align-middle">{{ $purchase->product->name }}</td>
						<td class="align-middle">{{ $purchase->value }}</td>
						<td class="align-middle">{{ $purchase->client->street }}, {{ $purchase->client->number }}, {{ $purchase->client->address }}</td>
						<td>			
							<a href="{{ route('purchases.show', ['purchase' => $purchase->id]) }}">
								<i class="fas fa-eye"></i>
								Ver
							</a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</section>
</div>
@stop