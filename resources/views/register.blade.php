@extends('app')

@section('content')


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card shadow">
                <div class="card-header bg-dark text-white text-center">
                    <h4 id="formTitle">Register Form</h4>
                </div>

                <div class="card-body">
                    <!-- Register Form -->
                    <form id="registerForm" method="POST" action="">
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
                            <a href="#">
                                Login
                            </a>
                        </p>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endSection('')