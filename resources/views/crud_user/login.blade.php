@extends('auth_layout')

@section('form')



<h3 class="card-header text-center">Log In</h3>
<div class="position-relative">
        @if(session('success'))
            <div class="alert alert-success text-center" id="success-alert">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger text-center" id="error-alert">
                {{ session('error') }}
            </div>
        @endif
        </div>
<div class="card-body">
   
    <form method="POST" action="{{ route('login.custom') }}">
        @csrf
        <div class="form-group mb-3">
            <input type="email" placeholder="Email" id="email" class="form-control" name="email" required autofocus>
        </div>
        <div class="form-group mb-3">
            <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
        </div>
        <div class="d-flex justify-content-between">

            <button type="submit" class="btn btn-success "style="width:100%">Login</button>
        </div>
    </form>
    <p class="text-center mt-3 mb-3">OR</p>
    <div class="social-buttons">
        <a href="{{ route('social.login', 'google') }}" class="btn btn-google btn-block mb-2"> <i class="fab fa-google me-2"></i> Google</a>
        <a href="{{ route('social.login', 'facebook') }}" class="btn btn-outline-primary btn-block mb-2"> <i class="fab fa-facebook-f me-2"></i> Facebook</a>
        <a href="{{ route('social.login', 'github') }}" class="btn btn-outline-dark btn-block mb-2"><i class="fab fa-github me-2"></i> Github</a>
    </div>
    <div class="text-center mt-4">
        <a href="#" class="forgot-password">Bạn chưa có tài khoản?</a>
        <a href="{{ route('register-user') }}" class="signup-link">Register</a>
    </div>
</div>
<!-- <script src="{{ asset('js/login.js') }}"></script> -->
@endsection