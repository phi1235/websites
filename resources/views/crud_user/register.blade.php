@extends('auth_layout')

@section('form')
<h3 class="card-header text-center">Register</h3>
<div class="card-body">
    <form method="POST" action="{{ route('register.custom') }}">
        @csrf
        <div class="form-group mb-3">
            <input type="text" placeholder="Name" id="name" class="form-control" name="name" required>
            <span id="name-check" class="text-danger"></span>
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group mb-3">
            <input type="email" placeholder="Email" id="email" class="form-control" name="email" required>
            <span id="email-check" class="text-danger"></span>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Ô nhập mật khẩu -->
        <div class="form-group mb-3">
            <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
            <span id="password-check" class="text-danger"></span>
        </div>

        <!-- Ô nhập lại mật khẩu -->
        <div class="form-group mb-3">
            <input type="password" placeholder="Confirm Password" id="password_confirmation" class="form-control"
                name="password_confirmation" required>
            <span id="match-check" class="text-danger"></span>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-success"style="width:100%">Register</button>
        </div>
    </form>
    <br>
    <div class="text-center mt-4">
        <a href="#" class="forgot-password">Đã có tài khoản?</a>
        <a href="{{ route('login') }}" class="signup-link"> Đăng nhập</a>
    </div>
</div>

<!-- Gọi file JavaScript -->
<script src="{{ asset('js/register.js') }}"></script>
@endsection