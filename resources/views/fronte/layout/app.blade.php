<html lang="{{ app()->getLocale() }}">

<head>
    @include('fronte.layout.head')
</head>
<body>
<div class="wrapper">

    @include('fronte.layout.header')
    <div class="content-wrapper">
        @yield('content')
    </div>
</div>

</body>
</html>