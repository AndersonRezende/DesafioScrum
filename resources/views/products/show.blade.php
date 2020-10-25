@extends('layouts.admin')
@section('content')
<h1>Produto</h1>
<div class="row justify-content-center">
	<div class="intro-item mb-12 mb-lg-0">
		<ul class="list-group">
			<li class="list-group-item list-group-item-action list-group-item-info">
				<h4>
					<i class="fas fa-info" id="h4"></i>
					Dados do produto
				</h4>
			</li>
			<li class="list-group-item">
				<i class="fas fa-box" id="h4"></i>
				Nome:
				{{ $product->name }}							
			</li>
			<li class="list-group-item">
				<i class="fas fa-file-alt" id="h4"></i>
				Descrição:
				{{ $product->description }}
			</li>
			<li class="list-group-item">
				<i class="fas fa-list-ol" id="h4"></i>
				Estoque:
				{{ $product->amount }}
			</li>
			<li class="list-group-item">
				<i class="fas fa-money-bill-alt" id="h4"></i>
				Valor:
				{{ $product->value }}							
			</li>

			<li class="list-group-item">
				<i class="fas fa-images" id="h4"></i>
				Arquivos:

				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" >
					<div class="carousel-inner">
						{{ $first = true }}
						@foreach($product->productsDetail as $item)
						<img src="{{ url('public/products/'.$item->filename) }}" alt="{{ $item->filename }}">
						{{ $first = false }}
						@endforeach

					</div>
					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</li>
		</ul>
	</div>
</div>

@stop