@extends('admin.layout.app')

@section('content')
<div class="container mt-3 bg-secondary p-3 text-info">
    <span class="">Add Category</span>
    <a href="{{ route('categoryList') }}" class="btn btn-light text-dark float-end">Back</a>
    <form action="{{ route('categoryStore') }}" method="POST" class="mt-3" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="image">Images</label>
            <input type="file" name="image" id="image" class="form-control">        
        </div>
        <button type="submit" class="btn btn-info text-dark mt-2">Add Category</button>
    </form>
</div>
@endsection
