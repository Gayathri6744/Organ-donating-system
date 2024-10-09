@extends('user.user_header')
@section('content')

<style>
    .login-container {
        margin-top: 80px;
    }

    .login-card {
        border-radius: 10px;
        box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        border-radius: 10px 10px 0 0;
        padding: 20px;
        background-color: #007bff;
        color: white;
        text-align: center;
    }

    .card-header h3 {
        font-size: 2rem;
        margin: 0;
    }

    .form-group label {
        font-size: 1.25rem; /* Larger label text */
        font-weight: bold;
    }

    .form-control-lg {
        font-size: 1.2rem;
        padding: 15px;
        height: auto;
    }

    .btn-custom {
        background-color: #007bff;
        color: white;
        font-size: 1.25rem;
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 5px;
    }

    .btn-custom:hover {
        background-color: #0056b3;
    }

    .text-center a {
        font-weight: bold;
        font-size: 1.1rem;
        color: #007bff;
        text-decoration: none;
    }

    .text-center a:hover {
        color: #0056b3;
        text-decoration: underline;
    }
</style>

<div class="container login-container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card login-card">
                <div class="card-header">
                    <h3>Login</h3>
                </div>
                <div class="card-body p-4">
                    @if (session('fail'))
                    <div class="alert alert-success mt-5" style="width: 100%; max-width: 100%; height: 70px; margin-right: 40px; background-color: #dff0d8; color: #3c763d; font-size: 14px; line-height: 1.5;">
                        {{ session('fail') }}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control form-control-lg" id="email" name="email" required placeholder="Enter your email">
                        </div>
                        <!-- Password -->
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control form-control-lg" id="password" name="password" required placeholder="Enter your password">
                        </div>
                        <!-- Remember Me -->
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
                            <label class="form-check-label" for="remember_me">Remember me</label>
                        </div>
                        <!-- Login Button -->
                        <input type="submit" class="btn btn-custom" value="Login">
                    </form>
                </div>
            </div>
            <div class="text-center mt-3">
                <p>Don't have an account? <a href="{{ route('reg') }}">Register here</a></p>
            </div>
        </div>
    </div>
</div>

@endsection
