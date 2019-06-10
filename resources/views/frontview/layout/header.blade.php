<nav class="navbar">
    <div class="container-fluid">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="" class="navbar-brand"><img src="{{asset('uploads/cmslogo.jpg')}}" width="30px" height="30px" alt=""></a>
                <a class="navbar-brand" href="#">CMS</a>
            </div>

            <div class="collapse navbar-collapse" >
                <ul class="nav navbar-nav" id="icon-layout">
                    {{--@foreach($pageName as $title)--}}
                        {{--<li class="active"><a href="{{route('fronte')}}">{{$title->name}}</a></li>--}}
                    {{--@endforeach--}}
                    <li><a href="{{url('/test')}}">Pinboard</a></li>
                    <li><a href="{{url('/pages')}}">Calender</a></li>
                    <li><a href="{{url('/pages')}}">Friend</a></li>
                    <li>
                    <div class="dropdown">
                        <button class="dropbtn">Message
                            <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content">

                                <p>You have 3 messages</p>


                                    <a href="#">

                                            <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle pull-left" height="30px" width="30px" alt="User Image">


                                            Support Team
                                            <small class="pull-right"><i class="fa fa-clock-o"></i> 5 mins</small>

                                        <p>Why not buy a new awesome theme?</p>
                                    </a>
                            <a href="#">

                                <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle pull-left" height="30px" width="30px" alt="User Image">


                                Support Team
                                <small class="pull-right"><i class="fa fa-clock-o"></i> 5 mins</small>

                                <p>Why not buy a new awesome theme?</p>
                            </a>

                        </div>
                    </div>
                    </li>
                    {{--<li class=""><a href="#">Message</a></li>--}}
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{route('login')}}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
            </div>

    </div>
</nav>

