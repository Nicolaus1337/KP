<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />

    <link rel="stylesheet" href="{{ asset('') }}vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('') }}vendor/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('') }}vendor/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="https://unpkg.com/element-plus/dist/index.css">
    <!-- CSS for this page only -->
    @stack('css')
    <style>
    .scrollable-checkbox-list {
        max-height: 200px; /* Set the maximum height for the scrollable list */
        overflow-y: auto; /* Add vertical scrollbar when content overflows */
        border: 1px solid #ccc; /* Optional: Add a border for styling */
        padding: 10px; /* Optional: Add padding for spacing */
}

.btnlogout{
    padding-top: 5px;
    padding-right: 2px;
}
    
    </style>
    <!-- End CSS  -->

    <link rel="stylesheet" href="{{ asset('') }}assets/css/style.min.css">
    <link rel="stylesheet" href="{{ asset('') }}assets/css/bootstrap-override.min.css">
    <link rel="stylesheet" id="theme-color" href="{{ asset('') }}assets/css/dark.min.css">
</head>

<body>
    <div id="app">
        <div class="shadow-header"></div>
        @include('layouts.header')
        @include('layouts.sidenav')

        @yield('content')

        @include('layouts.settingdash')

        <footer>
        </footer>
        <div class="overlay action-toggle">
        </div>
    </div>
    <script src="https://unpkg.com/vue@next"></script>
    <script src="{{ asset('') }}vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="{{ asset('') }}vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="https://unpkg.com/element-plus"></script>
    <!-- js for this page only -->
    @stack('js')
    <!-- ======= -->
    <script src="{{ asset('') }}assets/js/main.min.js"></script>
    <script>
        Main.init()
    </script>
</body>

</html>