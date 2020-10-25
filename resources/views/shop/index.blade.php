@extends('layouts.client')
@section('content')

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
	<h1 class="display-4">Produtos</h1>
	<p class="lead">Veja nossos produtos.</p>
</div>

<div class="container">
	<div class="form-row justify-content-center" id="description-group">
		@foreach($products as $product)
		<div class="form-group col-md-4">
			<div class="card mb-4 shadow-sm">
				<div class="card-header">
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" >
						<div class="carousel-inner">
							{{ $first = true }}
							@foreach($product->productsDetail as $item)
							<img src="{{ url('public/products/'.$item->filename) }}" alt="Produto">
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
					<h4 class="my-0 font-weight-normal">{{ $product->name }}</h4>
				</div>
				<div class="card-body">
					<h1 class="card-title pricing-card-title">R${{ $product->value }}</small></h1>
					<p>{{ $product->description }}</p>
					@if($product->amount > 1)
					<p>Apenas {{ $product->amount }} itens restantes.</p>
					@else
					<p>Apenas {{ $product->amount }} item restante.</p>
					@endif
					
					<form action="{{ route('shoppingcarts.create', ['product' => $product->id]) }}" method="post">
						@csrf
						<button class="btn btn-lg btn-block btn-primary" type="submit" value="Remover">
							Comprar
						</button>
					</form>
				</div>
			</div>
		</div>
		@endforeach
	</div>



	<footer class="pt-4 my-md-5 pt-md-5 border-top">
		<div class="container">
			<span class="text-muted">Copyright © 2020.</span>
		</div>
	</footer>
</div>
@stop