<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <!-- Custom fonts -->
   
    <link href="{{ asset('backend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Custom styles -->
    <link href="{{ asset('backend/css/sb-admin-2.min.css') }}" rel="stylesheet">
    @yield('styles')
    <link href="{{ asset('backend/css/sidebar.css') }}" rel="stylesheet">
    
</head>
<body id="page-top">
    
    <div id="wrapper">
        @include('admin.partials.sidebar')
        
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('admin.partials.topbar')
                
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            @include('admin.partials.footer')
        </div>
    </div>
   
    <!-- Scripts -->
    <script src="{{ asset('backend/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/js/sb-admin-2.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
@yield('scripts')
<!-- Thêm script để xử lý toggle sidebar nếu cần -->
<script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>