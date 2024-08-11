@extends('admin.layout.app')

@section('content')
<hr>
<div class="container mt-3 bg-secondary text-info p-3">
    <span class="">Add Product</span>
    <a href="{{ route('productList') }}" class="btn btn-info text-secondary float-end">Back</a>

    <!-- Form for adding product -->
    <form action="{{ route('productStore') }}" class="mt-3" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Display validation errors -->
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
                    <option value="{{ $item->id }}" {{ old('category_id') == $item->id ? 'selected' : '' }}>
                        {{ $item->name }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="sub_category_id">SubCategory</label>
            <select name="sub_category_id" id="sub_category_id" class="form-control">
                <option value="">Select SubCategory</option>
                @foreach ($subcategories as $item)
                    <option value="{{ $item->id }}" {{ old('sub_category_id') == $item->id ? 'selected' : '' }}>
                        {{ $item->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock" class="form-control" value="{{ old('stock') }}" required>
        </div>
        <div class="form-group">
            <label for="carModel">Car Model</label>
            <input type="text" name="carModel" id="carModel" class="form-control" value="{{ old('carModel') }}" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ old('price') }}" required>
        </div>
        <div class="form-group">
            <label for="images">Images</label>
            <input type="file" name="images[]" id="images" class="form-control" multiple required>
        </div>
        <div class="form-group">
            <label for="carBrand">Product Name</label>
            <input type="text" name="carBrand" id="carBrand" class="form-control" value="{{ old('carBrand') }}" required>
        </div>
        <div class="form-group">
            <label for="madeIn">Made In</label>
            <input type="text" name="madeIn" id="madeIn" class="form-control" value="{{ old('madeIn') }}" required>
        </div>
        <button type="submit" class="btn btn-info text-secondary mt-2">Add Product</button>
    </form>
</div>

<script>
document.getElementById('category_id').addEventListener('change', function() {
    var categoryId = this.value;
    var subCategorySelect = document.getElementById('sub_category_id');
    
    subCategorySelect.innerHTML = '<option value="">Select SubCategory</option>';
    
    if (categoryId) {
        fetch('/get-subcategories/' + categoryId)
            .then(response => response.json())
            .then(data => {
                data.forEach(subCategory => {
                    var option = document.createElement('option');
                    option.value = subCategory.id;
                    option.text = subCategory.name;
                    subCategorySelect.appendChild(option);
                });
            });
    }
});
</script>
@endsection
