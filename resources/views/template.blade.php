<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name='csrf-token' content='{{ csrf_token() }}' />
    <title>Document</title>
    <link rel="stylesheet" href="{{ url('/css/bootstrap.min.css', []) }}">
</head>

<body>
    @yield('konten')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ url('/js/bootstrap.bundle.min.js', []) }}"></script>
    @stack('scripts')
</body>

</html>
