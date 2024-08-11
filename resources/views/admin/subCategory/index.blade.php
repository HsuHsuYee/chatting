@extends('admin.layout.app')
@section('content')
<hr>
<div class="container mt-3 bg-secondary p-3 text-info">
    <h1 class="mb-4">SubCategory List</h1>
    <a href="{{ route('subcategoryCreate') }}" class="btn btn-info text-secondary mb-4">Create Category</a>
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
                    <th>Category</th>
                    <th>SubCategory</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subcategory as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                            <a href="{{ route('subcategoryEdit', $item->id) }}" class="btn btn-success text-light">Edit</a>
                            <a href="{{ route('subcategoryDestory', $item->id) }}" class="btn btn-primary text-light">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection