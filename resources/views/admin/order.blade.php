@extends('admin.layout.app')

@section('content')
<div class="container">
    <h2>Your Orders</h2>
    @if($orders->isEmpty())
        <p>No orders found.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Car Model</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->carModel }}</td>
                        <td>{{ $order->price }}</td>
                        <td>{{ $order->qty }}</td>
                        <td>{{ $order->totalPrice }}</td>
                        <td>{{ ucfirst($order->status) }}</td>
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
@endsection
