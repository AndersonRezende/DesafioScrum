@extends('layouts.admin')
@section('content')
<table class="table table-bordered table-striped table-hover">
	<thead>
		<tr>
			<th>Nome</th>
			<th>Email</th>
			<th>Acesso</th>
		</tr>
	</thead>
	<tbody>
		@foreach($users as $user)
		<tr>
			<td>{{ $user->name }}</td>
			<td>{{ $user->email }}</td>
			<td>{{ $user->level->description }}</td>
		</tr>
		@endforeach
	</tbody>
</table>
@stop