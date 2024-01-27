<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    @include('studentdashboard.credentials.head')
</head>

<body>
    @include('studentdashboard.credentials.sidebar')
    @yield('content')
    @include('studentdashboard.credentials.footer')
    @include('studentdashboard.credentials.script')

    
</body>
</html>