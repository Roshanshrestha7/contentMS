<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>CMS</title>
@include('admin.layout.head')
</head>

<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">
    @include('admin.layout.header')
    @include('admin.layout.sidebar')

    <div class="content-wrapper" >
       @yield('content')
    </div>
    <div>
        @include('admin.layout.footer')
    </div>
</div>
</body>

</html>