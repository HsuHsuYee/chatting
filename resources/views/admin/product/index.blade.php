@extends('admin.layout.app')
@section('content')
@section('content')
<div class="container mt-3 text-info p-3">
    <h1 class="mb-4">Product List</h1>
    <a href="{{ route('productCreate') }}" class="btn btn-info text-dark mb-4">Create Product</a>
    @if ($message = Session::get('success'))
        <div id="successAlert" class="alert alert-success">
            <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                <i class="tim-icons icon-simple-remove"></i>
            </button>
            <span><b>{{ $message }}</span>
        </div>
        <script>
            // Function to hide the success alert after a specific time (in milliseconds)
            setTimeout(function() {
                $("#successAlert").fadeOut("slow");
            }, 3000); // Change 5000 to the desired time in milliseconds (e.g., 5000 milliseconds = 5 seconds)
        </script>
    @endif
    <div class="table-responsive overflow-scroll">
        <table id="datatable" class="table text-dark">
            <thead>
                <tr>
                    <th>ID</th>
                    {{-- <th>SubCategory</th> --}}
                    <th>Car Model</th>
                    <th>Product Name</th>
                    <th>Made</th>
                    <th>Stock</th>
                    <th>Price</th>
                    <th>Images</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    {{-- <td>{{ $item->subcategories()->name }}</td> --}}
                    <td>{{ $item->carModel }}</td>
                    <td>{{ $item->carBrand }}</td>
                    <td>{{ $item->madeIn }}</td>
                    <td>{{ $item->stock }}</td>
                    <td>{{ $item->price }}</td>
                    <td>
                        {{-- @foreach($item->images as $image) --}}
                        <img src="{{ asset('storage/' . $item->images[0]) }}" width="50" height="50">
                        {{-- @endforeach --}}
                    </td>
                    <td>
                            <a href="{{ route('productEdit', $item->id) }}" class="btn btn-success text-dark">Edit</a>
                            <a onclick="return confirm('Are you sure?')" href="{{ route('productDelete', $item->id) }}" class="btn btn-primary text-dark">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@endsection