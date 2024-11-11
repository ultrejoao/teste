@extends('layouts.app')
@section('content')
<main class="pt-90">
    <div class="mb-4 pb-4"></div>
    <section class="my-account container">
      <h2 class="page-title">Minha Conta</h2>
      <div class="row">
        <div class="col-lg-3">
            @include('user.account-nav')
        </div>
        <div class="col-lg-9">
          <div class="page-content my-account__dashboard">
            <h2>Olá, <strong>{{ Auth::user()->name }}</strong></h2>
            <p>Você está no seu Painel de Controle, acesse seus compras pelo carrinho! Você também pode alterar informações de sua conta<a class="unerline-link" href="{{ route('user.edit')}}">
                clicando aqui.</a></p>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection
