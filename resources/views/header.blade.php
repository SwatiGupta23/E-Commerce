<!-- </?php

use App\Http\Controllers\ProductController;
$total=0;
if(Session::has('user')){
    $total = ProductController::cartItem();
}

?> -->
<?php
    use App\Models\Cart;

    $total = 0;

    if (Session::has('user')) {
        $userId = Session::get('user')['id'];

        $total = Cart::where('user_id', $userId)->count();
    }
?>

<nav class="navbar navbar-expand-lg bg-white shadow-sm py-3">
    <div class="container">

        <!-- Logo -->
        <a class="navbar-brand fw-bold fs-3 text-primary" href="/">
            My<span class="text-dark">Store</span>
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
            aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavbar">

            <!-- Search Bar - Middle -->
            <form class="d-flex mx-lg-auto my-3 my-lg-0 search-box" action="/search" method="GET" role="search">
                <input class="form-control" type="search" name="query" placeholder="Search products..."
                    aria-label="Search products">

                <button class="btn btn-primary px-4" type="submit">
                    Search
                </button>
            </form>

            <!-- Navigation - Right -->
            <!-- <div class="navbar-nav ms-lg-auto align-items-lg-center gap-lg-3">
                <a class="nav-link text-dark" href="/">Home</a>

                <a class="nav-link text-dark" href="/about">About</a>
                <a class="nav-link text-dark" href="/login">Login</a>
                <a class="btn btn-primary rounded-pill px-4" href="/cart">cart ({{$total}})
                </a>
                <a class="nav-link text-dark" href="/logout">Logout</a>
                <a class="nav-link text-dark" href="#">
                    {{Session::get('user')}}
                </a>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{Session::get('user')}}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/logout">Logout</a></li>
                    </ul>
                </li>

            </div> -->

            <!-- Navigation - Right -->
            <div class="navbar-nav ms-lg-auto align-items-lg-center gap-lg-3">

                <a class="nav-link text-dark" href="/">Home</a>

                <a class="nav-link text-dark" href="/myorder">MyOrder</a>
                <a class="btn btn-primary rounded-pill px-4" href="/cartlist">
                    Cart ({{ $total }})
                </a>

                @if(Session::has('user'))

                <!-- User Dropdown -->
                <div class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle text-dark" href="#" id="userDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">

                        {{ Session::get('user')['name'] ?? 'My Account' }}

                    </a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                        <li>
                            <a class="dropdown-item text-danger" href="/logout">
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>

                @else

                <a class="nav-link text-dark" href="/login">Login</a>

                @endif


            </div>


        </div>
    </div>
</nav>


<style>
.search-box {
    width: 100%;
    max-width: 450px;
}

.search-box .form-control {
    border-radius: 25px 0 0 25px;
    padding: 11px 18px;
    border: 1px solid #dee2e6;
}

.search-box .btn {
    border-radius: 0 25px 25px 0;
}

.navbar-brand {
    letter-spacing: -1px;
}

.navbar .nav-link {
    font-weight: 500;
}

.navbar .nav-link:hover {
    color: #0d6efd !important;
}

@media (max-width: 991px) {
    .search-box {
        max-width: 100%;
    }

    .navbar-nav {
        align-items: stretch !important;
    }
}
</style>