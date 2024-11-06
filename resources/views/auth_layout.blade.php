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
            @yield('form') <!-- Placeholder for login or signup form -->
        </div>
    </div>
</div>
<script src="{{ asset('js/login.js') }}"></script>

@endsection