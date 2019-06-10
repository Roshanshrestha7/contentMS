@extends('frontend.layout.app')

@section('content')
    <div class="card">
        <div class="card-body" style="padding-top: 40px">
            {{--carousel image --}}
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">

                    @foreach($slider as $key=>$val)

                        @if($key==0)

                            <li data-target="#myCarousel" data-slide-to="{{$key}}" class="active"></li>

                        @else

                            <li data-target="#myCarousel" data-slide-to="{{$key}}"></li>

                        @endif

                    @endforeach
                </ol>


                <!-- Wrapper for slides -->


                <div class="carousel-inner">

                    @foreach($slider as $key=>$item)

                        @if($key==0)

                            <div class="item active">
                                <?php
                                $image = json_decode($item->image);
                                ?>
                                @if($image!=null)
                                    <img src="{{asset('storage/uploads/gallery/'. $image[0])}}"
                                         style="width: 100%; height:400px;"/>

                                @endif
                            </div>

                        @else
                            <div class="item">
                                <?php
                                $image = json_decode($item->image);
                                ?>
                                @if($image!=null)
                                    <img src="{{asset('storage/uploads/gallery/'. $image[0])}}"
                                         style="width: 100%; height:400px;"/>

                                @endif
                            </div>

                        @endif

                    @endforeach


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
            {{--/carousel image--}}
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
            <div class="card-body" >
                <div class="col-md-12" style="background-color: lightgrey; padding-top: 5px">
                    @if($gallery->count()>0)
                        @foreach($gallery as $galleries)
                            <div class="col-md-4" style="padding: 10px; border-radius: 3%;">
                                @if($galleries->image !== NULL)
                                    <?php
                                    $arr = json_decode($galleries->image);
                                    ?>
                                    @if($arr!=null)
                                        @foreach($arr as $key=> $img)
                                            <a href="{{url('/gallery/'.$galleries->id)}}">
                                                <img src="{{asset('storage/uploads/gallery/'. $img)}}"
                                                     style="width:100%; height: 200px; border-radius: 3%;">
                                            </a>
                                            <div class="bottom-left">
                                                <img src="{{asset('uploads/bc.jpg')}}" height="25px" width="25px" alt="">

                                            </div>
                                            <div class="top-right"><span class="post__date">

                                            <i class="seoicon-clock"></i>

                                            <time class="published" datetime="2016-04-17 12:00:00">
                                                {{$galleries->created_at->toFormattedDateString()}}
                                            </time>
                                        </span></div>
                                            <div class="centered"><h3>{{$galleries->title}}</h3></div>
                                            <br>
                                        @endforeach
                                    @endif
                                @endif
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection