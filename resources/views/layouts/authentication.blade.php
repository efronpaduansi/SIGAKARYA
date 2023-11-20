<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Login - Sigakarya</title>

        <link rel="shortcut icon" href="{{ asset('authentication/assets/images/fav.jpg') }}">
        <link rel="stylesheet" href="{{ asset('authentication/assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('authentication/assets/css/fontawsom-all.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('authentication/assets/css/style.css') }}" />
    </head>

    <body>
        @include('sweetalert::alert')
        <div class="container-fluid ">

            @yield('content')
        </div>

    </body>

    <script src="{{ asset('authentication/assets/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('authentication/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('authentication/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('authentication/assets/js/script.js') }}"></script>


</html>
