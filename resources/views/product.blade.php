@extends('app')

@section('content')
<style>
body {
    background: #f5f6fa;
    font-family: Arial, sans-serif;
}

a{
    text-decoration:none;
}

.product-slider {
    max-width: 1000px;
    margin: 60px auto;
}

.product-card {
    background: #fff;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
}

.product-img {
    width: 100%;
    height: 350px;
    object-fit: contain;
    padding: 25px;
    background: #eef1f5;
}

.product-content {
    padding: 35px;
}

.product-price {
    color: #0d6efd;
    font-size: 28px;
    font-weight: bold;
}

.carousel-control-prev,
.carousel-control-next {
    width: 45px;
    height: 45px;
    top: 45%;
    bottom: auto;
    background: #e5e6e7;
    border-radius: 50%;
    opacity: 1;
}

.carousel-control-prev {
    left: -22px;
}

.carousel-control-next {
    right: -22px;
}

.carousel-indicators {
    bottom: -55px;
}

.carousel-indicators [data-bs-target] {
    background-color: #0d6efd;
}

@media (max-width: 767px) {
    .product-img {
        height: 250px;
    }

    .product-content {
        padding: 25px;
    }

    .carousel-control-prev {
        left: 5px;
    }

    .carousel-control-next {
        right: 5px;
    }
}

.treding-img {
    width: 200px;
    height: 200px;
}
</style>

<div class="container custom-product">
    <div class="container product-slider">
        <div id="productCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">

            <!-- Slider indicators -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Product 1"></button>

                <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="1"
                    aria-label="Product 2"></button>

                <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="2"
                    aria-label="Product 3"></button>
                <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="3"
                    aria-label="Product 4"></button>
            </div>


            <div class="carousel-inner">

                @foreach ($products as $index => $item)

                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <div class="product-card">
                        <div class="row g-0 align-items-center">

                            <!-- Product Image -->
                            <div class="col-md-6">
                                <img src="{{ $item['gallery'] }}" class="product-img" alt="{{ $item['name'] }}">
                            </div>

                            <!-- Product Content -->
                            <div class="col-md-6">
                                <div class="product-content">

                                    <span class="badge bg-secondary mb-3">
                                        {{ $item['category'] ?? 'Featured Product' }}
                                    </span>

                                    <h2>{{ $item['name'] }}</h2>

                                    <p class="text-muted">
                                        {{ $item['description'] }}
                                    </p>

                                    <p class="product-price">
                                        ₹{{ number_format((float) $item['price']) }}
                                    </p>

                                    <a href="#" class="btn btn-success">
                                        Shop Now
                                    </a>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                @endforeach

            </div>


            <!-- Previous button -->
            <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev"
                aria-label="Previous product">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </button>

            <!-- Next button -->
            <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next"
                aria-label="Next product">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </button>

        </div>
    </div>

    <div class="treding-wrapper mt-2">
        <h2 class="text-center fw-bold mb-4">Featured Products</h2>
        <div class="d-flex justify-content-between">
            @foreach ($products as $item)
            <div class="">
                <a href="detail/{{$item['id']}}">
                    <img src="{{$item['gallery']}}" alt="Los Angeles" class="d-block treding-img rounded-2">
                    <div class="text-center">
                        <h6 class="fw-bold mt-1">{{$item['name']}}</h6>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

    </div>


</div>


@endSection