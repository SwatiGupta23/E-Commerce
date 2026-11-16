@extends('app')

@section('content')
<div class="container py-5">

<div class="row">

    <!-- Cart Products -->
    <div class="col-lg-12">

        @foreach($myorder as $item)

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



</div>
</div>
@endsection()