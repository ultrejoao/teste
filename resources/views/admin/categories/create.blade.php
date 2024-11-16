@extends('layouts.admin')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>ADICIONAR CATEGORIA</h3>
            <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                <li>
                    <a href="{{ route('admin.index') }}">
                        <div class="text-tiny">Painel</div>
                    </a>
                </li>
                <li>
                    <i class="icon-chevron-right"></i>
                </li>
                <li>
                    <div class="text-tiny">Adicionar Categoria</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <div class="flex items-center justify-between gap10 flex-wrap">
                <h4>Adicione uma nova categoria</h4>
            </div>

            <div class="wg-table table-all-user">
                <div class="table-responsive">
                    <form action="{{ route('admin.categories.store') }}" method="POST">
                        @csrf

                        <!-- Nome da Categoria -->
                        <div class="form-group">
                            <label for="name" class="body-title">Nome da Categoria</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>

                        <!-- Descrição da Categoria -->
                        <div class="form-group">
                            <label for="description" class="body-title">Descrição</label>
                            <textarea name="description" id="description" class="form-control"></textarea>
                        </div>

                        <!-- Botão de Salvar -->
                        <div class="form-group">
                            <button type="submit" class="tf-button style-3 w208" style="margin-top: 20px;">Salvar Categoria</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
