@extends('admin.layout.app')

@section('content')
<div class="container mt-3 text-info p-3">
    <span class="">Edit Product</span>
    <a href="{{ route('productList') }}" class="btn btn-info text-dark float-end">Back</a>
    <div class="mt-2 text-center">
        @foreach ($product->images as $image)
            <img src="{{ asset('storage/'.$image) }}" width="300" height="300">
        @endforeach
    </div>
    <form action="{{ route('productUpdate', $product->id) }}" class="mt-3" method="POST" enctype="multipart/form-data">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" class="form-control" required>
                <option value="">Select Category</option>
                @foreach ($categories as $item)
                    <option value="{{ $item->id }}" {{ old('category_id', $product->category_id) == $item->id ? 'selected' : '' }}>
                        {{ $item->name }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="sub_category_id">SubCategory</label>
            <select name="sub_category_id" id="sub_category_id" class="form-control">
                <option value="" {{ old('sub_category_id', $product->sub_category_id) == $item->id ? 'selected' : '' }}>Select SubCategory</option>
            </select>
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock" class="form-control" value="{{ old('stock', $product->stock) }}" required>
        </div>
        <div class="form-group">
            <label for="carModel">Car Model</label>
            <input type="text" name="carModel" id="carModel" class="form-control" value="{{ old('carModel', $product->carModel) }}" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ old('price', $product->price) }}" required>
        </div>
        <div class="form-group">
            <label for="images">Images</label>
            <input type="file" name="images[]" id="images" class="form-control" multiple>
            
        </div>
        <div class="form-group">
            <label for="carBrand">Product Name</label>
            <input type="text" name="carBrand" id="carBrand" class="form-control" value="{{ old('carBrand',$product->carBrand) }}" required>
        </div>
        <div class="form-group">
            <label for="madeIn">Made In</label>
            <input type="text" name="madeIn" id="madeIn" class="form-control" value="{{ old('madeIn',$product->madeIn) }}" required>
        </div>
        <button type="submit" class="btn btn-info text-dark mt-2">Update Product</button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var categoryId = document.getElementById('category_id').value;
        var subCategorySelect = document.getElementById('sub_category_id');
        
        // Fetch subcategories when the page loads
        if (categoryId) {
            fetchSubCategories(categoryId);
        }
        
        document.getElementById('category_id').addEventListener('change', function() {
            categoryId = this.value;
            subCategorySelect.innerHTML = '<option value="">Select SubCategory</option>';
            
            if (categoryId) {
                fetchSubCategories(categoryId);
            }
        });
        
        function fetchSubCategories(categoryId) {
            fetch('/get-subcategories/' + categoryId)
                .then(response => response.json())
                .then(data => {
                    data.forEach(subCategory => {
                        var option = document.createElement('option');
                        option.value = subCategory.id;
                        option.text = subCategory.name;
                        subCategorySelect.appendChild(option);
                    });
                    
                    // Set the previously selected subcategory
                    const oldSubCategoryId = "{{ old('sub_category_id', $product->sub_category_id) }}";
                    if (oldSubCategoryId) {
                        subCategorySelect.value = oldSubCategoryId;
                    }
                });
        }
    });
</script>
@endsection
