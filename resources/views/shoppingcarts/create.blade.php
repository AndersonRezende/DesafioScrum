@extends('layouts.client')
@section('content')

<div class="row">
  <div class="col-md-4 order-md-2 mb-4">
    <h4 class="d-flex justify-content-between align-items-center mb-3">
      <span class="text-muted">Seu carrinho</span>
      <span class="badge badge-secondary badge-pill">1</span>
    </h4>
    <ul class="list-group mb-3">
      <li class="list-group-item d-flex justify-content-between lh-condensed">
        <div>
          <h6 class="my-0">{{ $product->name }}</h6>
          <small class="text-muted">{{ $product->description }}</small>
        </div>
        <span class="text-muted">R${{ $product->value }}</span>
      </li>
      <li class="list-group-item d-flex justify-content-between">
        <span>Total (BRL)</span>
        <strong>R${{ $product->value }}</strong>
      </li>
    </ul>
  </div>

  <div class="col-md-8 order-md-1">
    <h4 class="mb-3">Dados pessoais</h4>
    <form class="needs-validation" novalidate="">
      <div class="mb-3">
        <label for="name">Nome</label>
        <div class="input-group">
          <input type="text" class="form-control" readonly="" id="name" required="" value="{{ $client->name }}">
        </div>
      </div>

      <div class="mb-3">
        <label for="email">Email</label>
        <input type="email" class="form-control" readonly="" id="email" value="{{ $client->email }}">
      </div>

      <div class="mb-3">
        <label for="address">Endereço</label>
        <input type="text" class="form-control" readonly="" id="address" required="" value="{{ $client->street }}, {{ $client->number }}, {{ $client->address }}">
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="country">Cidade</label>
          <input type="text" class="form-control" readonly="" id="city" required="" value="{{ $client->city }}">
        </div>
        <div class="col-md-6 mb-3">
          <label for="country">Estado</label>
          <input type="text" class="form-control" readonly="" id="state" required="" value="{{ $client->state }}">
        </div>
      </div>
      <hr class="mb-4">

      <h4 class="mb-3">Pagamento</h4>
      <div class="d-block my-3">
        <div class="custom-control custom-radio">
          <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
          <label class="custom-control-label" for="credit">Cartão de crédito</label>
        </div>
        <div class="custom-control custom-radio">
          <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
          <label class="custom-control-label" for="debit">Cartão de débito</label>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="card-name">Nome no cartão</label>
          <input type="text" class="form-control" id="card-name" placeholder="" required="">
          <small class="text-muted">Nome exibido no cartão</small>
        </div>
        <div class="col-md-6 mb-3">
          <label for="card-number">Número do cartão</label>
          <input type="text" class="form-control" id="card-number" placeholder="" required="">
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 mb-3">
          <label for="card-expiration">Data de validade</label>
          <input type="text" class="form-control" id="card-expiration" placeholder="" required="">
        </div>
        <div class="col-md-3 mb-3">
          <label for="cc-cvv">CVV</label>
          <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
        </div>
      </div>
      <hr class="mb-4">
      <button class="btn btn-primary btn-lg btn-block" type="submit">Finalizar a compra</button>
    </form>
  </div>
</div>
@stop