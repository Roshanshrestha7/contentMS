<html>
<head>
    @include('frontend.layout.head')
    <title>CMS</title>
</head>
<body>
    @include('frontend.layout.header')
   <div class="card-body">

       @yield('content')
   </div>

    @include('frontend.layout.footer')
</body>
</html>