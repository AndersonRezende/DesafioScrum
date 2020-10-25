@extends('layouts.admin')
@section('content')
<h1>Cliente</h1>
<div class="row justify-content-center">
	<div class="intro-item mb-12 mb-lg-0">
		<ul class="list-group">
			<li class="list-group-item list-group-item-action list-group-item-info">
				<h4>
					<i class="fas fa-info" id="h4"></i>
					Dados do cliente
				</h4>
			</li>
			<li class="list-group-item">
				<i class="fas fa-user" id="h4"></i>
				Nome:
				{{ $client->name }}							
			</li>
			<li class="list-group-item">
				<i class="fas fa-map-marked" id="h4"></i>
				Endereço:
				{{ $client->street }}, {{ $client->number }}, {{ $client->address }}						
			</li>
			<li class="list-group-item">
				<i class="fas fa-city" id="h4"></i>
				Cidade:
				{{ $client->city }} - {{ $client->state }}
			</li>
			<li class="list-group-item">
				<i class="fas fa-envelope" id="h4"></i>
				E-mail:
				{{ $client->email }}							
			</li>
		</ul>
	</div>
</div>
@stop