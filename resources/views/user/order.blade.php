@extends('user.layout.app')
@extends('user.layout.nav')

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
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection