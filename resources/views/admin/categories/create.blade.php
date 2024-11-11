@extends('layouts.admin')

@section('content')
    <div class="main-content-inner">
        <h3>Add New Category</h3>

        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" name="name" id="name" required class="form-control">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Save Category</button>
        </form>
    </div>
@endsection
