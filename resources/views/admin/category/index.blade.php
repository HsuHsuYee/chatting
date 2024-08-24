@extends('admin.layout.app')
@section('content')
<div class="container p-3 text-info">
    <h1 class="mb-4">Category List</h1>
    <a href="{{ route('categoryCreate') }}" class="btn btn-info text-dark mb-4">Create Category</a>
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
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                            <a href="{{ route('categoryEdit', $item->id) }}" class="btn btn-success text-dark">Edit</a>
                            <a href="{{ route('categoryDestory', $item->id) }}" class="btn btn-primary text-dark">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection