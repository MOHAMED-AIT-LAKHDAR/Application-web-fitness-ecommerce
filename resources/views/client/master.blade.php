<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('client.head')

    <title>@yield('titre')</title>
</head>
<body>
    @include('client.header')
    <div class="content">

        @yield('content')
    </div>
    @include('client.footer')
    @include('client.script')

</body>
</html>
