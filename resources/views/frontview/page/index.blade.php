@extends('frontview.layout.app')

@section('content')

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
        <div class="container-fluid">
            <br>
            <h5> Your Pinboard</h5>
            <br>
        </div>
        <div class="board">
            <div class="col-lg-12 col-md-12 col-sm-12">
                @foreach($page as $pag)
                    <div class="col-lg-4 col-sm-4">


                            @if($pag->banner !== NULL)
                                <?php
                                $arr = json_decode($pag->banner);
                                ?>

                                @foreach($arr as $key=> $banner)
                                    @if(file_exists('test' . $banner))

                                        <img src="{{URL::to('storage/uploads/page/'. $banner)}}" width="300" height="200">  &nbsp; &nbsp;

                                    @endif
                                @endforeach
                            @endif
                    </div>
                @endforeach
            </div>
        </div>




{{--<div class="container-fluid bg-3 text-center" >--}}
    {{--<h3>Some of my pages</h3><br>--}}
    {{--<div>--}}
        {{--<div class="col-lg-12 col-md-12 col-sm-12">--}}
            {{--@foreach($test as $pag)--}}
                {{--<div class="col-lg-4 col-sm-4">--}}
                    {{--<h5>{{$pag->name}}</h5>--}}
                    {{--<div class="dropdown">--}}

                        {{--@if($pag->banner !== NULL)--}}
                            {{--<?php--}}
                            {{--$arr = json_decode($pag->banner);--}}
                            {{--?>--}}

                            {{--@foreach($arr as $key=> $banner)--}}
                                {{--@if(file_exists('storage/uploads/test/' . $banner))--}}

                                    {{--<img src="{{URL::to('storage/uploads/test/'. $banner)}}"> &nbsp; &nbsp;--}}

                                {{--@endif--}}
                            {{--@endforeach--}}
                        {{--@endif--}}
                        {{--<div class="dropdown-content">--}}
                            {{--@if($pag->banner !== NULL)--}}
                                {{--<?php--}}
                                {{--$arr = json_decode($pag->banner);--}}
                                {{--?>--}}

                                {{--@foreach($arr as $key=> $banner)--}}
                                    {{--@if(file_exists('storage/uploads/test/' . $banner))--}}

                                        {{--<img src="{{URL::to('storage/uploads/test/'. $banner)}}" width="200" height="100"/> &nbsp; &nbsp;--}}

                                    {{--@endif--}}
                                {{--@endforeach--}}


                            {{--@endif--}}
                            {{--<div class="desc">Beautiful Cinque Terre</div>--}}

                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<br> <br>--}}
                    {{--<a href="{{route('single',['id' => $pag->id])}}" class="btn btn-info btn-xs">more</a>--}}
                {{--</div>--}}
            {{--@endforeach--}}

        {{--</div>--}}

    {{--</div>--}}
{{--</div>--}}
@endsection