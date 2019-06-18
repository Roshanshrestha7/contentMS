@extends('frontend.layout.app')

@section('content')
    <section class="content" style=" background-color: lightgrey;">
        <div class="card">
            <div class="card-header" >

            </div>
            <div class="card-body" >
                <img src="{{asset($event->image)}}" alt="" style="width: 100% " height="400px">
                <div class="centered" ><h3>!!! WE BELIEVE ON YOU !!!</h3></div>

                <div class="contain" style="padding: 10px; background-color: lightgrey; min-height: 200px">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{$event->title}}</h3>
                    </div>
                    <br>
                    <div class="box-body">
                        <div class="row col-md-12">
                            <div class="col-md-4">
                                <label for="">Date:</label>
                                {{$event->from_date}} - {{$event->to_date}}
                            </div>
                            <div class="col-md-4">
                                <label for="">Time:</label>
                                {{$event->start_time}} - {{$event->end_time}}
                            </div>
                            <div class="col-md-4">
                                <label for="">Venue:</label>
                                {{$event->venue}}
                            </div>
                        </div>
                        <br>
                        <br>
                        {!! $event->description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection