<html lang="{{ app()->getLocale() }}">

<head>
    @include('frontend.layout.head')
</head>
<body>
<div class="wrapper">

    @include('frontend.layout.header')
    <div class="content-wrapper">
        @yield('content')
    </div>
</div>

</body>
</html>