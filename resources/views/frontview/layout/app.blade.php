<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <title>CMS</title>
        @include('frontview.layout.head')
        @include('frontview.layout.foot')
    </head>
    <body>
        <div>
            @include('frontview.layout.header')
            <div class="contain">
                @yield('content')
            </div>
            @include('frontview.layout.footer')
        </div>
    </body>
</html>