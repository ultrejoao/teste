@extends('layouts.admin')

@section('content')
<div class="col-lg-9">
    <div class="page-content my-account__dashboard" style="padding:100px">
      <h3>Olá, <strong>{{ Auth::user()->name }}</strong></h3>
      <p>Você está no seu Painel de Controle, adicione produtos e categorias através do menu lateral. Você também pode alterar informações de sua conta<a class="unerline-link" href="{{ route('user.edit')}}">
          clicando aqui.</a></p>
    </div>
</div>
@endsection
