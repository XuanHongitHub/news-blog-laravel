<!-- resources/views/layouts/app.blade.php -->
<!doctype html>
<html lang="en">

<head>
    <title>@yield('title', 'Trang Chủ')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('auth/css/style.css') }}">
    @vite([''])
</head>

<body>
    <header>
        <!-- Header Content Here -->
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <!-- Footer Content Here -->
    </footer>

    <script src="{{ asset('auth/js/jquery.min.js') }}"></script>
    <script src="{{ asset('auth/js/popper.js') }}"></script>
    <script src="{{ asset('auth/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('auth/js/main.js') }}"></script>
</body>

</html>
