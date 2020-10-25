@extends('layouts.admin')
@section('content')
<h1>Usuário</h1>
<div class="row justify-content-center">
	<div class="intro-item mb-12 mb-lg-0">
		<ul class="list-group">
			<li class="list-group-item list-group-item-action list-group-item-info">
				<h4>
					<i class="fas fa-info" id="h4"></i>
					Dados do usuário
				</h4>
			</li>
			<li class="list-group-item">
				<i class="fas fa-user" id="h4"></i>
				Nome:
				{{ $user->name }}							
			</li>
			<li class="list-group-item">
				<i class="fas fa-id-card" id="h4"></i>
				Nível de acesso
				{{ $user->level->description }}							
			</li>
			<li class="list-group-item">
				<i class="fas fa-envelope" id="h4"></i>
				E-mail:
				{{ $user->email }}							
			</li>
		</ul>
	</div>
</div>
@stop