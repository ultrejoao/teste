@extends('layouts.admin')
@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Editar Categoria</h3>
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
                    <div class="text-tiny">Editar Categoria</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <div class="flex items-center justify-between gap10 flex-wrap">
                <h4>Editar Informações da Categoria</h4>
            </div>
            <div class="wg-table table-all-user">
                <div class="table-responsive">
                    @if(Session::has('status'))
                        <p class="alert alert-success">{{ Session::get('status') }}</p>
                    @endif
                    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name" class="body-title">Nome da Categoria</label>
                            <input type="text" name="name" id="name" value="{{ $category->name }}" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="description" class="body-title">Descrição</label>
                            <textarea name="description" id="description" class="form-control">{{ $category->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <button class="tf-button style-1 w208" style="margin-top: 20px;" type="submit">Atualizar Categoria</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
