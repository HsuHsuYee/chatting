@extends('admin.layout.app')

@section('content')
<div class="container p-3 text-info">
    <span class="">Edit Category</span>
    <a href="{{ route('categoryList') }}" class="btn btn-light text-dark float-end">Back</a>
    <div class="text-center">
        @if($category->image)
        <img src="{{ asset('storage/'.$category->image) }}" width="300" height="300">
        @endif
    </div>
    <form action="{{ route('categoryUpdate',$category->id) }}" class="mt-3" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{$category->name}}" required>
        </div>
        <div class="form-group">
            <label for="image">Images</label>
            <input type="file" name="image" id="image" class="form-control">        
        </div>
        <button type="submit" class="btn btn-info text-dark mt-2">Update Category</button>
    </form>
</div>
@endsection
