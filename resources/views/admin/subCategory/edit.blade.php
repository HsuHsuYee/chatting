@extends('admin.layout.app')

@section('content')
<div class="container mt-3 bg-secondary p-3 text-info">
    <span>Edit SubCategory</span>
    <a href="{{ route('categoryList') }}" class="btn btn-light text-dark float-end">Back</a>
    <div class="text-center">
        @if($subcategory->image)
        <img src="{{ asset('storage/'.$subcategory->image) }}" width="300" height="300">
        @endif
    </div>
    <form action="{{ route('subcategoryUpdate', $subcategory->id) }}" class="mt-3" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $subcategory->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">SubCategory Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $subcategory->name }}">
        </div>
        <div class="form-group">
            <label for="image">Images</label>
            <input type="file" name="image" id="image" class="form-control">    
        </div>
        <button type="submit" class="btn btn-info text-dark mt-2">Update SubCategory</button>
    </form>
</div>
@endsection
