@extends('app')

@section('content')

<div class="container py-5">

<div class="d-flex align-items-center justify-content-between">
    <h2 class="fw-bold mb-4">Shopping Cart</h2>

    <a href="/ordernow" class="btn btn-primary">Order Now</a>
</div>
    <div class="row">

        <!-- Cart Products -->
        <div class="col-lg-8">

            @foreach($products as $item)

            <div class="card border-0 shadow mb-3">
                <div class="card-body">

                    <div class="row align-items-center">

                        <div class="col-md-3">
                            <img src="{{ $item->gallery }}" class="img-fluid rounded"
                                style="height:130px; width:100%; object-fit:cover;">
                        </div>

                        <div class="col-md-4">
                            <h5 class="fw-bold">
                                {{ $item->name }}
                            </h5>

                            <p class="text-muted mb-1">
                                Product ID: {{ $item->id }}
                            </p>

                            <h6 class="text-primary">
                                ₹{{ number_format($item->price, 2) }}
                            </h6>
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Quantity</label>

                            <div class="input-group" style="max-width:130px;">
                                <button class="btn btn-outline-secondary" type="button"
                                    onclick="changeQty(this, -1)">−</button>

                                <input type="number" class="form-control text-center quantity" value="1" min="1"
                                    data-price="{{ $item->price }}">

                                <button class="btn btn-outline-secondary" type="button"
                                    onclick="changeQty(this, 1)">+</button>
                            </div>
                        </div>

                        <div class="col-md-2 text-end">
                            <a href='/removecart/{{$item->cart_id}}' class="btn btn-sm btn-outline-danger" type="button">
                                <i class="bi bi-trash"></i> Remove
                            </a>
                        </div>

                    </div>

                </div>
            </div>

            @endforeach

            <div class="card border-0 shadow-sm p-5 text-center">
                <h4>Your cart is empty!</h4>
                <p class="text-muted">Add some products to your cart.</p>
                <a href="/" class="btn btn-primary mx-auto">
                    Continue Shopping
                </a>
            </div>



        </div>

        <!-- Order Summary -->
        <div class="col-lg-4">

            <div class="card border-0 shadow">
                <div class="card-body p-4">

                    <h4 class="fw-bold mb-4">Order Summary</h4>

                    <div class="d-flex justify-content-between mb-3">
                        <span>Subtotal</span>
                        <strong id="subtotal">₹0.00</strong>
                    </div>

                    <div class="d-flex justify-content-between mb-3">
                        <span>Shipping</span>
                        <strong id="shipping">₹50.00</strong>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between mb-4">
                        <h5>Total</h5>
                        <h5 class="text-primary" id="grandTotal">
                            ₹50.00
                        </h5>
                    </div>

                    <a href="/checkout" class="btn btn-primary w-100 py-2">
                        Proceed to Checkout
                    </a>

                    <a href="/" class="btn btn-outline-secondary w-100 mt-2">
                        Continue Shopping
                    </a>

                </div>
            </div>

        </div>

    </div>
</div>
<script>
function changeQty(button, change) {
    let input = button.parentElement.querySelector('.quantity');

    let quantity = parseInt(input.value) || 1;

    quantity = Math.max(1, quantity + change);

    input.value = quantity;

    calculateTotal();
}

function calculateTotal() {
    let subtotal = 0;

    document.querySelectorAll('.quantity').forEach(input => {
        let price = parseFloat(input.dataset.price) || 0;
        let quantity = parseInt(input.value) || 1;

        subtotal += price * quantity;
    });

    let shipping = subtotal > 0 ? 50 : 0;
    let total = subtotal + shipping;

    document.getElementById('subtotal').innerText =
        '₹' + subtotal.toFixed(2);

    document.getElementById('shipping').innerText =
        '₹' + shipping.toFixed(2);

    document.getElementById('grandTotal').innerText =
        '₹' + total.toFixed(2);
}

document.querySelectorAll('.quantity').forEach(input => {
    input.addEventListener('change', calculateTotal);
});

calculateTotal();
</script>
@endsection