@extends('layouts.admin')
@section('content')
<h1>Cliente</h1>
<div class="row justify-content-center">
	<div class="intro-item mb-12 mb-lg-0">
		<ul class="list-group">
			<li class="list-group-item list-group-item-action list-group-item-info">
				<h4>
					<i class="fas fa-info" id="h4"></i>
					Dados da compra
				</h4>
			</li>
			<li class="list-group-item">
				<i class="fas fa-user" id="h4"></i>
				Cliente:
				{{ $purchase->client->name }}							
			</li>
			<li class="list-group-item">
				<i class="fas fa-box" id="h4"></i>
				Produto:
				{{ $purchase->product->name }} ({{ $purchase->product->id }})
			</li>
			<li class="list-group-item">
				<i class="fas fa-map-marked" id="h4"></i>
				Endereço:
				{{ $purchase->client->street }}, {{ $purchase->client->number }}, {{ $purchase->client->address }}
			</li>
			<li class="list-group-item">
				<i class="fas fa-city" id="h4"></i>
				Cidade:
				{{ $purchase->client->city }} - {{ $purchase->client->state }}
			</li>
			<li class="list-group-item">
				<i class="fas fa-envelope" id="h4"></i>
				E-mail:
				{{ $purchase->client->email }}							
			</li>
			<li class="list-group-item">
				<i class="fas fa-money-bill-alt" id="h4"></i>
				Valor:
				R$ {{ $purchase->value }}							
			</li>
		</ul>
	</div>
</div>
@stop