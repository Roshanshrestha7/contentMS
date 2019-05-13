<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
@include('admin.layout.head')
</head>

<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">
    @include('admin.layout.header')
    @include('admin.layout.sidebar')

    <div class="content-wrapper">
       @yield('content')
    </div>
    @include('admin.layout.footer')

</div>
</body>

</html>