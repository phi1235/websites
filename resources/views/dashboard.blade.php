@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h5>Welcome, {{ Auth::user()->name }}!</h5>
                    
                    <!-- User Information -->
                    <div class="mt-4">
                        <h6>Your Information:</h6>
                        <table class="table">
                            <tr>
                                <th>Name:</th>
                                <td>{{ Auth::user()->name }}</td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td>{{ Auth::user()->email }}</td>
                            </tr>
                            <tr>
                                <th>Role:</th>
                                <td>
                                    <span class="badge bg-{{ Auth::user()->role === 'admin' ? 'danger' : 'primary' }}">
                                        {{ ucfirst(Auth::user()->role) }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>Joined Date:</th>
                                <td>{{ Auth::user()->created_at->format('d M Y') }}</td>
                            </tr>
                        </table>
                    </div>

                    <!-- Quick Links -->
                    <div class="mt-4">
                        <h6>Quick Links:</h6>
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action">
                                <i class="fas fa-user-edit"></i> Edit Profile
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <i class="fas fa-key"></i> Change Password
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <i class="fas fa-bell"></i> Notifications
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection