@extends('admin.layout.app')

@section('content')
<hr>
<div class="container mt-3 bg-secondary p-3 text-info">
    <span class="">Add SubCategory</span>
    <a href="{{ route('subcategoryList') }}" class="btn btn-light text-dark float-end">Back</a>
    <form action="{{ route('subcategoryStore') }}" method="POST" class="mt-3" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Category Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="category_id">SubCategory</label>
            <select name="category_id" id="category_id" class="form-control">
                @foreach ($category as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-info text-secondary mt-2">Add SubCategory</button>
    </form>
</div>
@endsection
