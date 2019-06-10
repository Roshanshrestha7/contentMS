@extends('frontend.layout.app')

@section('content')
    <section class="content" style=" background-color: lightgrey;">
        <div class="card">
            <div class="card-header" >

            </div>
            <div class="card-body" >
                <img src="{{asset('uploads/cc.jpg')}}" alt="" style="width: 100% " height="400px">
                <div class="centered" ><h3>!!! WE BELIEVE ON YOU !!!</h3></div>

                <div class="contain" style="padding: 10px; background-color: lightgrey; min-height: 200px">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{$pages->title}}</h3>
                    </div>
                    <br>
                    <div class="box-body">

                        {!! $pages->description !!}
                        {{--{{$pages->description}}--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection