@extends('dashboard')

@section('content')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<main class="login-form">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <h3 class="card-header text-center">Login</h3>
                    <div class="card-body">
                        @if(session('error'))
                            <div class="alert alert-danger text-center">{{ session('error') }}</div>
                        @endif
                        <form method="POST" action="{{ route('login.custom') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" placeholder="Email" id="email" class="form-control" name="email" required autofocus>
                            </div>
                            <div class="form-group mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                        </form>
                        <div class="text-center mt-4">
                        
                        <a href="{{ route('register-user') }}" class="btn btn-danger btn-block mb-2">Register</a>
                            </div>
                            <a href="{{ route('social.login', 'google') }}" class="btn btn-danger btn-block mb-2">Login with Google</a>
                            <a href="{{ route('social.login', 'facebook') }}" class="btn btn-primary btn-block mb-2">Login with Facebook</a>
                            <a href="{{ route('social.login', 'github') }}" class="btn btn-dark btn-block">Login with GitHub</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .col-md-6{
            transform: translate(50px, 100px);
        }
    </style>
</main>

@endsection
