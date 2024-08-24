@extends('admin.layout.app')

@section('content')
<div class="container">
    <h2>Your Orders</h2>
    @if($orders->isEmpty())
        <p>No orders found.</p>
    @else
        <table class="table table-bordered table-responsive">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Car Model</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->carModel }}</td>
                        <td>{{ $order->price }}</td>
                        <td>{{ $order->qty }}</td>
                        <td>{{ $order->totalPrice }}</td>
                        <td>{{ ucfirst($order->status) }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $order->payment_screenshot) }}" width="100" height="100" 
                                 class="zoom zoom-out" onclick="toggleZoom(this)">
                        </td>
                        <td>
                            @if($order->status == 'pending')
                                <form action="{{ route('admin.orders.accept') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $order->id }}">
                                    <button type="submit" class="btn btn-success">Accept</button>
                                </form>
                            @else
                                <span class="badge badge-success">Accepted</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

<script>
    function toggleZoom(image) {
        if (image.classList.contains('zoom-out')) {
            image.classList.remove('zoom-out');
            image.classList.add('zoom-in');
        } else {
            image.classList.remove('zoom-in');
            image.classList.add('zoom-out');
        }
    }
</script>
@endsection
