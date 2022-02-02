<!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.meta')
    
    <title>SIPPRA | @yield('title')</title>

    <link rel="stylesheet" rel="apple-touch-icon" href="">
    <link rel="stylesheet" rel="shortcut icon" href="image/x-icon">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    @stack('before-style')

    @include('includes.style')

    @stack('after-style')
</head>

<body>
    @include('includes.header')

    @yield('content')
    @include('includes.footer')

    @stack('before-script')
    @include('includes.script')
    @stack('after-script')
    
</body>
</html>