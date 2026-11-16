@extends('app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-header bg-dark text-white text-center">
                    <h4 id="formTitle">Login Form</h4>
                </div>

                <div class="card-body">
                    <!-- Login Form -->
                    <form method="POST"
                          action="/login">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email"
                                   class="form-control"
                                   value=""
                                   placeholder="Enter email" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password"
                                   class="form-control"
                                   placeholder="Enter password" required>
                        </div>

                        <button type="submit"
                                class="btn btn-dark w-100">
                            Login
                        </button>

                        <p class="text-center mt-3">
                            Don't have an account?
                            <a href="#">
                                Register
                            </a>
                        </p>
                    </form>

                  
                </div>
            </div>

        </div>
    </div>
</div>

@endSection('')

<!-- 
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login & Register</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card shadow">
                <div class="card-header bg-dark text-white text-center">
                    <h4 id="formTitle">Login Form</h4>
                </div>

                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Login Form --
                    <form id="loginForm" method="POST"
                          action="">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email"
                                   class="form-control"
                                   value="{{ old('email') }}"
                                   placeholder="Enter email" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password"
                                   class="form-control"
                                   placeholder="Enter password" required>
                        </div>

                        <button type="submit"
                                class="btn btn-dark w-100">
                            Login
                        </button>

                        <p class="text-center mt-3">
                            Don't have an account?
                            <a href="#" onclick="showRegister(); return false;">
                                Register
                            </a>
                        </p>
                    </form>

                    <!-- Register Form --
                    <form id="registerForm" method="POST"
                          action=""
                          style="display:none;">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name"
                                   class="form-control"
                                   placeholder="Enter full name" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email"
                                   class="form-control"
                                   placeholder="Enter email" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password"
                                   class="form-control"
                                   placeholder="Create password"
                                   minlength="8" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password"
                                   name="password_confirmation"
                                   class="form-control"
                                   placeholder="Confirm password"
                                   minlength="8" required>
                        </div>

                        <button type="submit"
                                class="btn btn-success w-100">
                            Register
                        </button>

                        <p class="text-center mt-3">
                            Already have an account?
                            <a href="#" onclick="showLogin(); return false;">
                                Login
                            </a>
                        </p>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<script>
    function showRegister() {
        document.getElementById('loginForm').style.display = 'none';
        document.getElementById('registerForm').style.display = 'block';
        document.getElementById('formTitle').innerText = 'Register Form';
    }

    function showLogin() {
        document.getElementById('registerForm').style.display = 'none';
        document.getElementById('loginForm').style.display = 'block';
        document.getElementById('formTitle').innerText = 'Login Form';
    }
</script>

</body>
</html> -->
