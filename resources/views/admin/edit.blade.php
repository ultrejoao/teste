@extends('layouts.admin')
@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>Editar Item</h3>
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
                    <div class="text-tiny">Editar Item</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <div class="flex items-center justify-between gap10 flex-wrap">
                <h4>Editar Informações</h4>
            </div>
            <div class="wg-table table-all-user">
                <div class="table-responsive">
                    @if(Session::has('status'))
                        <p class="alert alert-success">{{ Session::get('status') }}</p>
                    @endif
                    <form action="{{ route('admin.product.update', $product->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group" >
                            <label for="name" class="body-title">Nome:</label>
                            <input type="text" name="name" id="name" value="{{ $product->name }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="category_id" class="body-title">Categoria:</label>
                            <select name="category_id" id="category_id" class="form-control" required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="regular_price" class="body-title">Preço:</label>
                            <input type="text" name="regular_price" id="regular_price" value="{{ $product->regular_price }}" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="quantity" class="body-title">Quantidade:</label>
                            <input type="number" name="quantity" id="quantity" value="{{ $product->quantity }}" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <button class="tf-button style-1 w208" style="margin-top:10px" class="btn btn-primary">Atualizar Item</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

