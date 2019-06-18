@extends('frontend.layout.app')

@section('content')

    <div class="card" style=" min-height: 495px; padding-top: 70px; padding-left: 10px" >
        @if($events->count()>0)
            @foreach($events as $event)
                <div class="col-md-3 col-sm-12" style="padding: 10px; border-radius: 3%;">
                    <div class="centered"><h3>{{$event->title}}</h3></div>
                    <a href="{{route('singleevent',['id' => $event->id])}}"><img src="{{asset($event->image)}}" alt="" style="width:100%; height: 200px; border-radius: 3%;"></a>
                </div>
            @endforeach
        @endif
    </div>

@endsection