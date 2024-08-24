@extends('user.layout.app')
@extends('user.layout.nav')

@section('content')
<div class="container">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (isset($isCheckout) && $isCheckout)
        <h2 class="mt-3 pt-3 mb-3 text-center">Checkout</h2>
        <form action="{{ route('cart.placeOrder') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="d-flex justify-content-between">
                <img src="{{ asset('images/kpay.jpg') }}" style="width:200px;height:200px" alt="kpay" class="img-fluid">
                <img src="{{ asset('images/wave.jpg') }}" style="width:200px;height:200px" alt="wave" class="img-fluid">
            </div>
            <div class="form-group">
                <label for="payment_id">Select Payment Method</label>
                <select name="payment_id" id="payment_id" class="form-control">
                    @foreach ($payments as $payment)
                        <option value="{{ $payment->id }}">{{ $payment->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="payment_screenshot">Payment Screenshot</label>
                <input type="file" name="payment_screenshot" id="payment_screenshot" class="form-control">
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="number" name="phone" id="phone" class="form-control" @error('phone') is-invalid @enderror>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <textarea name="address" id="address" class="form-control" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-dark text-white mb-3">Place Order</button>
        </form>
    @else
        <h2 class="mt-3">Your Cart</h2>
        @if ($cartItems->isEmpty())
            <p>Your cart is empty.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Car Model</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $item)
                        <tr data-id="{{ $item->id }}" data-stock="{{ $item->products->stock }}">
                            <td>{{ $item->carModel }}</td>
                            <td>{{ $item->price }}</td>
                            <td>
                                <button class="btn btn-danger btn-sm decrease-qty">-</button>
                                <span class="qty">{{ $item->qty }}</span>
                                <button class="btn btn-success btn-sm increase-qty" 
                                    @if($item->qty === $item->products->stock) 
                                        disabled 
                                    @endif>+</button>
                            </td>
                            <td class="total-price">{{ $item->totalPrice }}</td>
                            <td>
                                <form action="{{ route('cart.remove') }}" method="POST" class="remove-item-form">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <button type="submit" class="btn btn-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-right"><strong>Total:</strong></td>
                        <td id="grand-total">{{ $grandTotal }}</td>
                        <td>
                            <a href="{{ route('checkout') }}" class="btn btn-dark text-white">Proceed to Checkout</a>
                        </td>
                    </tr>
                </tfoot>
            </table>
        @endif
    @endif
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.increase-qty').on('click', function() {
            var row = $(this).closest('tr');
            var id = row.data('id');
            var qtyElem = row.find('.qty');
            var currentQty = parseInt(qtyElem.text());
            var newQty = currentQty + 1;

            updateCart(id, newQty, row);
        });

        $('.decrease-qty').on('click', function() {
            var row = $(this).closest('tr');
            var id = row.data('id');
            var qtyElem = row.find('.qty');
            var currentQty = parseInt(qtyElem.text());
            var newQty = Math.max(0, currentQty - 1);

            updateCart(id, newQty, row);
        });

        function updateCart(id, qty, row) {
            $.ajax({
                url: '{{ route('cart.update') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    qty: qty
                },
                success: function(response) {
                    if (response.success) {
                        if (qty === 0) {
                            row.remove();
                        } else {
                            row.find('.qty').text(qty);
                            row.find('.total-price').text(response.totalPrice);

                            var stock = row.data('stock');
                            var increaseBtn = row.find('.increase-qty');
                            var decreaseBtn = row.find('.decrease-qty');

                            // Disable/enable buttons based on stock
                            if (qty >= stock) {
                                increaseBtn.prop('disabled', true);
                            } else {
                                increaseBtn.prop('disabled', false);
                            }

                            if (qty <= 1) {
                                decreaseBtn.prop('disabled', true);
                            } else {
                                decreaseBtn.prop('disabled', false);
                            }
                        }
                        updateGrandTotal();
                    }
                }
            });
        }

        function updateGrandTotal() {
            var grandTotal = 0;
            $('.total-price').each(function() {
                grandTotal += parseFloat($(this).text());
            });
            $('#grand-total').text(grandTotal.toFixed(2));
        }
    });
</script>
@endsection
