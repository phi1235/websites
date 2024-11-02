@extends('dashboard')

@section('content')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">

<div class="container-fluid login-container">
    <!-- Left section -->
    <div class="left-section">
        <h1>Become a user</h1>
        <p>Free to use, easy to love</p>
        <ul class="features">
            <li>✅ Track your progress</li>
            <li>✅ Set your goals</li>
            <li>✅ Get a personalized learning path</li>
            <li>✅ Test your skills</li>
            <li>✅ Practice coding in browser</li>
            <li>✅ Build and host a website</li>
            <li>✅ Teacher Toolbox</li>
        </ul>
    </div>

    <!-- Right section (Auth form) -->
    <div class="col-md-6 right-section d-flex align-items-center justify-content-center">
        <div class="card login-card" id="auth-card">
            <!-- Log In Form -->
            <div id="login-form">
                <h3 class="card-header text-center">Log In</h3>
                <div class="card-body">
                    <div class="social-buttons">
                        <a href="{{ route('social.login', 'google') }}" class="btn btn-outline-dark btn-block mb-2">Google</a>
                        <a href="{{ route('social.login', 'facebook') }}" class="btn btn-outline-primary btn-block mb-2">Facebook</a>
                        <a href="{{ route('social.login', 'github') }}" class="btn btn-outline-dark btn-block mb-2">Github</a>
                    </div>
                    <p class="text-center mt-3 mb-3">OR</p>
                    <form method="POST" action="{{ route('login.custom') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="email" placeholder="Email" id="email" class="form-control" name="email" required autofocus>
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="forgot-password">Forgot Password?</a>
                            <button type="submit" class="btn btn-success">Login</button>
                        </div>
                    </form>
                    <div class="text-center mt-4">
                        <span>Don't have an account?</span> <a href="javascript:void(0);" class="signup-link" onclick="showSignUp()">Sign up</a>
                    </div>
                </div>
            </div>

            <!-- Sign Up Form -->
            <div id="signup-form" style="display: none;">
                <h3 class="card-header text-center">Sign Up</h3>
                <div class="card-body">
                    <form method="POST" action="{{ route('register.custom') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="text" placeholder="Full Name" id="name" class="form-control" name="name" required autofocus>
                        </div>
                        <div class="form-group mb-3">
                            <input type="email" placeholder="Email" id="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" placeholder="Confirm Password" id="confirm_password" class="form-control" name="confirm_password" required>
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Sign Up</button>
                    </form>
                    <div class="text-center mt-4">
                        <span>Already have an account?</span> <a href="javascript:void(0);" class="login-link" onclick="showLogin()">Log in</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function showSignUp() {
        document.getElementById('login-form').style.display = 'none';
        document.getElementById('signup-form').style.display = 'block';
    }

    function showLogin() {
        document.getElementById('signup-form').style.display = 'none';
        document.getElementById('login-form').style.display = 'block';
    }
</script>
@endsection
