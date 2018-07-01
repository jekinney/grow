<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://unpkg.com/@coreui/coreui/dist/js/coreui.min.js"></script>

        <!-- CoreUI CSS -->
        <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui/dist/css/coreui.min.css">

        <title>GBG Dashboard</title>
    </head>
    <body class="app sidebar-show aside-menu-show">
        <div id="app">
            
        @include( 'dashboard.partials.top-nav' )

            <div class="app-body">
                <div class="sidebar">
                    @include( 'dashboard.partials.side-bar' )
                </div>
                <main class="main">
                    @include( 'dashboard.partials.alerts' )
                    @yield( 'content' )
                </main>
            </div>

        @include( 'dashboard.partials.footer' )

        </div>
    </body>
</html>