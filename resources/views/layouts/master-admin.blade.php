<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Responsive Admin Dashboard Template">
        <meta name="keywords" content="admin,dashboard">
        <meta name="author" content="stacks">
        <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        
        <!-- Title -->
        <title>Monitoring</title>

        @stack('prepend-style')
        @include('includes.admin.style')
        @stack('addon-style')
    </head>
    <body>
        <div class='loader'>
            <div class='spinner-grow text-primary' role='status'>
                <span class='sr-only'>Loading...</span>
            </div>
        </div>
        <div class="connect-container align-content-stretch d-flex flex-wrap">
            <div class="page-container">
                @include('includes.admin.navbar')
                @include('includes.admin.horizontal-bar')
                @yield('content')
                @include('includes.admin.footer')
            </div>
        </div>
        
        @stack('prepend-script')
        @include('includes.admin.script')
        @stack('addon-script')
    </body>
</html>