<html>
    <head>
        <title>cms</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    </head>
    <body>
    {{--navbar start--}}
    <div class="navbar navbar-fixed-top">
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
                    <li><a href="#calender">Calender</a></li>
                    <li><a href="#friend">Friend</a></li>
                    <li>
                        <div class="dropdown">
                            <button class="dropbtn"><i class="fa fa-envelope" aria-hidden="true"><span class="label label-success">4</span></i>
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
                    <li></li>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{route('login')}}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
            </div>
        </div>
    </div>
    {{--navbar close--}}

    {{--carousel image begin--}}
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->


        <div class="carousel-inner">
            <div class="item active">
                <img src="{{asset('uploads/aa.jpg')}}" alt="Los Angeles" style="width:100%; height:400px; ">
                <div class="carousel-caption">
                    <h3>Los Angeles</h3>
                    <p>LA is always so much fun!</p>
                </div>
            </div>

            <div class="item">
                <img src="{{asset('uploads/bb.jpg')}}" alt="Chicago" style="width: 100%; height:400px;">
                <div class="carousel-caption">
                    <h3>Chicago</h3>
                    <p>Thank you, Chicago!</p>
                </div>
            </div>

            <div class="item">
                <img src="{{asset('uploads/cc.jpg')}}" alt="New york" style="width: 100%; height:400px; ">
                <div class="carousel-caption">
                    <h3>New York</h3>
                    <p>We love the Big Apple!</p>
                </div>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    {{--carousel image end--}}

    {{--pinboard begin--}}
    <div class="container-fluid">
        <br>


        <div style="text-align:right">
            <h5 class="pull-left"> Your Pinboard</h5>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
        <br>
    </div>
    {{--pinboard end--}}

    {{-- content start--}}
    <div class="row" style="background-color: lightgrey;">
        <div class="col-md-12">
            <div class="col-md-4">
                <img src="{{asset('uploads/ss.jpg')}}" alt="Snow" style="width:100%; height: 200px; border-radius: 3%;">
                <div class="bottom-left">
                    <img src="{{asset('uploads/bc.jpg')}}" height="25px" width="25px" alt="">
                    <img src="{{asset('uploads/bc.jpg')}}" height="25px" width="25px" alt="">
                    <img src="{{asset('uploads/bc.jpg')}}" height="25px" width="25px" alt="">
                </div>
                <div class="top-right">5 min ago</div>
                <div class="centered" >Company retreat in deer valley</div>
            </div>
            <div class="col-md-4">
                <div class="text-block" style="width:100%; height: 200px; border-radius: 3%;">
                    <h4>Nature</h4>
                    <p>What a beautiful sunrise</p>
                </div>
            </div>
            <div class="col-md-4">
                <video width="100%" controls>
                    <source src="{{ asset('uploads/video/mov.mp4') }}" type="video/mp4">
                    <source src="{{ asset('uploads/video/mov.mp4') }}" type="video/ogg">
                </video>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-4">
                <iframe style="width:100%; height: 200px; border-radius: 3%;" src="https://www.youtube.com/embed/tgbNymZ7vqY">
                </iframe>
            </div>
            <div class="col-md-4">
                <img src="{{asset('uploads/ee.jpg')}}" alt="Snow" style="width:100%; height: 200px">
                <div class="bottom-left">Bottom Left</div>
                <div class="top-right">Top Right</div>
                <div class="centered">Centered</div>
            </div>
            <div class="col-md-4">
                <img src="{{asset('uploads/ff.jpg')}}" alt="Snow" style="width:100%; height: 200px">
                <div class="bottom-left">Bottom Left</div>
                <div class="top-right">Top Right</div>
                <div class="centered">Centered</div>
            </div>
        </div>
    </div>
    {{--content end--}}

    {{--footer start--}}
    <footer class="container-fluid text-center">
        <p>Copyright &copy; 2014-2016 </p>
        <?php
        $date = '';
        $todaydateTime= new DateTime($date, new DateTimeZone('UTC'));
        $todaydateTime->setTimeZone(new DateTimeZone('Asia/Kathmandu'));
        echo $todaydateTime->format('Y-m-d H:i');
        ?>
    </footer>
    {{--footer end--}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style>
        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        /* Add a gray background color and some padding to the footer */
        footer {
            background-color: #f2f2f2;
            padding: 10px;
        }
    </style>



    </body>
</html>





