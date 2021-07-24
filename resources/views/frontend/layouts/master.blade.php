<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Real Pro Traning Solutions">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- ========== Page Title ========== -->
    <title>
        @yield('title','Home | Real Pro Traning Solutions')
    </title>

    <!-- ========== style file include ========== -->
    @include('frontend.partials.styles')
    <!-- ========== style file include ========== -->
</head>

<body>
    <!-- ========== User content file include ========== -->
    @yield('user_content')
    <!-- ========== User content file include ========== -->



<!-- ========== scripts file include ========== -->
    @include('frontend.partials.scripts')
<!-- ========== scripts file include ========== -->
</body>
</html>
