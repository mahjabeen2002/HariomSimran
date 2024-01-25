<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    @include('backend.credentials.head')
</head>

<body>
    @include('backend.credentials.sidebar')
    @yield('content')
    @include('backend.credentials.footer')
    @include('backend.credentials.script')

    
</body>
</html>