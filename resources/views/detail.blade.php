@extends('app')

@section('content')

<style>
body {
    background: #f8f9fa;
}

.product-image {
    width: 100%;
    height: 420px;
    object-fit: contain;
    background: #fff;
    border-radius: 12px;
    padding: 20px;
}

.thumbnail {
    width: 75px;
    height: 75px;
    object-fit: contain;
    background: white;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 5px;
    cursor: pointer;
}

.price {
    color: #dc3545;
    font-size: 28px;
    font-weight: 700;
}

.old-price {
    color: #999;
    text-decoration: line-through;
}

.color-option {
    width: 28px;
    height: 28px;
    display: inline-block;
    border-radius: 50%;
    cursor: pointer;
    border: 2px solid white;
    outline: 1px solid #aaa;
    margin-right: 8px;
}
</style>
</head>

<body>

    <!-- Product Details -->
    <div class="container py-3">

        <div class="row g-4">
            <!-- Product Images -->
            <div class="col-md-6">

                <img src="{{$details['gallery']}}" class="product-image" alt="Product">

                <!-- <div class="d-flex gap-3 mt-3">
                    <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=150" class="thumbnail"
                        alt="Thumbnail">
                    <img src="https://images.unsplash.com/photo-1495555961986-6d4c1ecb7be3?w=150" class="thumbnail"
                        alt="Thumbnail">
                    <img src="https://images.unsplash.com/photo-1460353581641-37baddab0fa2?w=150" class="thumbnail"
                        alt="Thumbnail">
                </div> -->

            </div>

            <!-- Product Information -->
            <div class="col-md-6">

                <span class="badge bg-success mb-2">In Stock</span>

                <h2 class="fw-bold">{{$details['name']}}</h2>

                <p class="text-muted">
                    Category: {{$details['category']}}
                </p>

                <div class="mb-1">
                    <span class="text-warning fs-5">★★★★★</span>
                    <span class="text-muted">(120 Reviews)</span>
                </div>

                <div class="mb-1">
                    <span class="price">₹{{$details['price']}}</span>
                    <span class="old-price ms-2">₹3,999</span>
                    <span class="text-success ms-2">37% OFF</span>
                </div>

                <hr>

                <h6 class="fw-bold">Product Description</h6>

                <p class="text-muted">{{$details['description']}}
                </p>
                <div class="d-flex flex-column justify-content-between">
                    <div>
                        <!-- Color -->
                        <h6 class="fw-bold mt-1">Select Color</h6>

                        <span class="color-option" style="background:red"></span>
                        <span class="color-option" style="background:black"></span>
                        <span class="color-option" style="background:blue"></span>
                    </div>

                    <div>
                        <!-- Size -->
                        <h6 class="fw-bold mt-1">Select Size</h6>

                        <div class="d-flex gap-2">
                            <button class="btn btn-outline-dark">SM</button>
                            <button class="btn btn-outline-dark">MD</button>
                            <button class="btn btn-dark">LG</button>
                            <button class="btn btn-outline-dark">XL</button>
                        </div>
                    </div>

                    <div>
                        <!-- Quantity -->
                        <h6 class="fw-bold mt-1">Quantity</h6>

                        <div class="input-group mb-3" style="width:140px">
                            <button class="btn btn-outline-secondary" onclick="changeQty(-1)">-</button>

                            <input type="text" id="qty" class="form-control text-center" value="1" readonly>

                            <button class="btn btn-outline-secondary" onclick="changeQty(1)">+</button>
                        </div>

                    </div>
                </div>

                <!-- Buttons -->
                <div class="d-flex gap-3">
                    <form action='/add_to_cart' method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{$details['id']}}" />
                        <button class="btn btn-dark btn-lg flex-fill">
                            Add To Cart
                        </button>
                    </form>
                    
                    <button class="btn btn-danger btn-lg flex-fill">
                        Buy Now
                    </button>
                </div>

                <hr>

                <p><strong>Delivery:</strong> Free Delivery</p>
                <p><strong>Return:</strong> 7 Days Return Policy</p>
                <p><strong>Payment:</strong> Cash on Delivery Available</p>

            </div>
        </div>
    </div>

    <script>
    function changeQty(value) {
        let qty = document.getElementById("qty");
        let current = parseInt(qty.value);

        if (current + value >= 1) {
            qty.value = current + value;
        }
    }
    </script>

    @endsection()