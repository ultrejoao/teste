@extends('layouts.admin')

@section('content')
    <div class="main-content-inner">
        <h3>All Categories</h3>

        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Add New Category</a>

        @if(session('status'))
            <p class="alert alert-success">{{ session('status') }}</p>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
