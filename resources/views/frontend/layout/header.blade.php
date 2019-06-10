{{--<div class="navbar navbar-fixed-top">--}}
{{--<div class="container-fluid">--}}

{{--<div class="navbar-header">--}}
{{--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">--}}
{{--<span class="icon-bar"></span>--}}
{{--<span class="icon-bar"></span>--}}
{{--<span class="icon-bar"></span>--}}
{{--</button>--}}
{{--<a href="" class="navbar-brand"><img src="{{asset('uploads/cmslogo.jpg')}}" width="30px" height="30px"--}}
{{--alt=""></a>--}}
{{--<a class="navbar-brand" href="{{route('home')}}">CMS</a>--}}
{{--</div>--}}

{{--<div class="collapse navbar-collapse">--}}
{{--<ul class="nav navbar-nav" id="icon-layout">--}}
{{--<li class="active"><a href="{{route('home')}}">Home</a></li>--}}
{{--<li>--}}
{{--@foreach($pageName as $name)--}}
{{--<div class="dropdown">--}}
{{--<a href="{{route('single.show',['id'=> $name->id])}}">{{$name->title}}</a>--}}
{{--<div class="dropdown-content">--}}
{{--@foreach($name->children as $headname)--}}
{{--<a href="{{route('single.show',['id'=> $headname->id])}}">{{$headname->title}}</a>--}}
{{--@endforeach--}}
{{--</div>--}}
{{--</div>--}}
{{--@endforeach--}}
{{--</li>--}}
{{--<li class="active"><a href="{{route('contact')}}">Contact Us</a></li>--}}
{{--</ul>--}}
{{--<ul class="nav navbar-nav navbar-right">--}}
{{--<li><a href="{{route('login')}}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>--}}
{{--</ul>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}


<nav class="navbar-fixed-top navbar-default ">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('frontend')}}">CMS</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{route('frontend')}}">Home</a></li>

            @foreach($pageName as $name)
                    @if(count($name->children)>0)
                        <li class="dropdown">
                            <a href="{{route('single.show',['id'=> $name->id])}}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{$name->title}} <span class="pull-right-container">
                             <i class="fa fa-caret-down"></i>
                                </span></a>
                        <ul class="dropdown-menu">
                            @foreach($name->children as $headname)
                                <li><a href="{{route('single.show',['id'=> $headname->id])}}">{{$headname->title}}</a>
                                </li>
                            @endforeach
                        </ul>
                        </li>
                    @else
                        <li><a href="{{route('single.show',['id' => $name->id])}}">{{$name->title}}</a></li>
                    @endif
                @endforeach
                <li><a href="{{route('notice')}}">Notice</a></li>
                <li><a href="{{route('contact')}}">Contact Us</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{route('login')}}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>