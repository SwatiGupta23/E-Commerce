@extends('app')

@section('content')

<div class="container py-5">

    <h2 class="fw-bold mb-2">Checkout</h2>
    <p class="text-muted mb-4">Complete your details to place your order.</p>

    <form action="/orderplace" method="POST">
        @csrf

        <div class="row g-4">

            <!-- Customer Details -->
            <div class="col-lg-7">

                <div class="card border-0 shadow-sm rounded-3 mb-4">
                    <div class="card-body p-4">

                        <h4 class="fw-bold mb-4">Shipping Information</h4>

                        <div class="row g-3">

                            <div class="col-md-6">
                                <label class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter your full name"
                                    required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Email Address</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter your email"
                                    required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Mobile Number</label>
                                <input type="tel" name="phone" class="form-control" placeholder="Enter mobile number"
                                    required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">PIN Code</label>
                                <input type="text" name="pincode" class="form-control" placeholder="Enter PIN code"
                                    required>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Full Address</label>
                                <textarea name="address" class="form-control" rows="3"
                                    placeholder="House no, street, area..." required></textarea>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">City</label>
                                <input type="text" name="city" class="form-control" placeholder="Enter city" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">State</label>
                                <input type="text" name="state" class="form-control" placeholder="Enter state" required>
                            </div>

                        </div>

                    </div>
                </div>

                <!-- Payment Method -->
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body p-4">

                        <h4 class="fw-bold mb-4">Payment Method</h4>

                        <div class="form-check border rounded-3 p-3 mb-3">
                            <input class="form-check-input ms-0 me-2" type="radio" name="payment" value="COD"
                                id="cod" checked>

                            <label class="form-check-label fw-semibold" for="cod">
                                Online Payment
                            </label>
                        </div>

                        <div class="form-check border rounded-3 p-3 mb-3">
                            <input class="form-check-input ms-0 me-2" type="radio" name="payment" value="UPI"
                                id="upi">

                            <label class="form-check-label fw-semibold" for="EMI">
                                EMI Payment
                            </label>
                        </div>

                        <div class="form-check border rounded-3 p-3">
                            <input class="form-check-input ms-0 me-2" type="radio" name="payment" value="Card"
                                id="card">

                            <label class="form-check-label fw-semibold" for="card">
                                Payment on Delivery
                            </label>
                        </div>

                        <small class="text-muted d-block mt-3">
                            Online payment requires a payment gateway integration.
                        </small>
                        <button class="btn btn-primary mt-2 float-right">Submit</button>
                    </div>
                </div>

            </div>

            <!-- Order Summary -->
            <div class="col-lg-5">

                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body p-4">

                        <h4 class="fw-bold mb-4">Your Order</h4>


                        <!-- <div class="d-flex align-items-center gap-3 mb-3">

                                <img src=""
                                    width="70" height="70"
                                    class="rounded"
                                    style="object-fit:cover;">

                                <div class="flex-grow-1">
                                    <h6 class="mb-1 fw-semibold">
                                    Tax
                                    </h6>
                                    <small class="text-muted">
                                        Quantity: 1
                                    </small>
                                </div>

                                <strong>
                                
                                </strong>

                            </div> -->
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <td>Price</td>
                                    <td>{{$total}}</td>
                                </tr>
                                <tr>
                                    <td>Tax</td>
                                    <td>0 Rupees</td>
                                </tr>
                                <tr>
                                    <td>Delivery</td>
                                    <td>100</td>
                                </tr>
                                <tr>
                                    <td>Total Amount</td>
                                    <td>{{$total+100}}</td>
                                </tr>
                            </tbody>
                        </table>


                        <hr>


                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted">Subtotal</span>

                        </div>

                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted">Shipping</span>

                        </div>

                        <hr>

                        <div class="d-flex justify-content-between mb-4">
                            <h5 class="fw-bold">Total</h5>
                            <h5 class="fw-bold text-primary">
                                ₹{{ $total}}
                            </h5>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg w-100">
                            Place Order
                        </button>

                        <a href="/cart" class="btn btn-outline-secondary w-100 mt-2">
                            Back to Cart
                        </a>

                    </div>
                </div>

            </div>

        </div>

    </form>

</div>

@endsection