@extends('layouts.admin')

@section('content')
<div class="main-content-inner">
    <div class="main-content-wrap">
        <div class="flex items-center flex-wrap justify-between gap20 mb-27">
            <h3>ADICIONAR PRODUTO</h3>
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
                    <div class="text-tiny">Adicionar</div>
                </li>
            </ul>
        </div>

        <div class="wg-box">
            <div class="flex items-center justify-between gap10 flex-wrap">
                <h4>Adicione um novo produto</h4>
            </div>
            <div class="wg-table table-all-user">
                <div class="table-responsive">
                    <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name" class="body-title">Nome do Produto</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="category_id" class="body-title">Categoria:</label>
                            <select name="category_id" id="category_id" class="form-control" required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="slug" class="body-title">SKU</label>
                            <input type="text" name="slug" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="description" class="body-title">Descrição</label>
                            <textarea name="description" class="form-control" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="regular_price" class="body-title">Preço Normal</label>
                            <input type="text" name="regular_price" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="sale_price" class="body-title">Preço de Promoção (Optional)</label>
                            <input type="text" name="sale_price" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="quantity" class="body-title">Quantidade</label>
                            <input type="number" name="quantity" class="form-control" required>
                        </div>

                        <div class="upload-image flex-grow">
                            <div class="item" id="imgpreview" style="display:none">
                                <img src="upload-1.html" class="effect8" alt="">
                        </div>
                            <div id="upload-file" class="item up-load" style="margin-top:20px;">
                                <label class="uploadfile" for="myFile">
                                    <span class="icon">
                                        <i class="icon-upload-cloud"></i>
                                    </span>
                                    <span class="body-text">Arraste a imagem / <span
                                            class="tf-color">clique aqui para procurar</span></span>
                                    <input type="file" id="myFile" name="image" accept="image/*">
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="tf-button style-3 w208" style="margin-top: 20px;">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

