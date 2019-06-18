@extends('admin.layout.app')

@section('content')

    <section class="content-header">
        <h1>
            General Form Elements
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-file"></i> Event</a></li>
            <li><a href="#">Index</a></li>
            <li><a href="#">Edit</a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Create Event</h3>
                    </div>

                <!-- /.box-header -->
                    <!-- form start -->
                    {!! Form::model($event,['method'=>'put','route'=>['event.update',$event],'enctype'=>'multipart/form-data']) !!}
                    @csrf
                    <div class="box-body">

                        <div class="row">

                            <div class="form-group">
                                <label for="exampleInputPassword1">Title</label>
                                <input type="text" class="form-control" value="{{$event->title}}" name="title" id="inputEmail3" placeholder="Title">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Description</label>
                                <textarea  name="description" placeholder="Place some text here"
                                           style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"> {{$event->description}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Banner-Image</label>
                                <input type="file" class="form-control" name="image" id="inputEmail3">
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <label style="color: darkred">Event Details</label>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="exampleInputPassword1">Event-From</label>
                                <input type="text" class="form-control" value="{{$event->from_date}}" name="from_date" id="datepicker">

                            </div>
                            <div class="form-group col-md-3">
                                <label for="exampleInputPassword1">Event-To</label>
                                <input type="text" class="form-control" value="{{$event->to_date}}" name="to_date" id="datepicker1">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="exampleInputPassword1">Start-Time</label>
                                <input class="form-control" name="start_time" value="{{$event->start_time}}" type="text">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="exampleInputPassword1">End-Time</label>
                                <input class="form-control" name="end_time" value="{{$event->end_time}}" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Venue</label>
                            <input type="text" class="form-control" name="venue" value="{{$event->venue}}" id="inputEmail3" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Action</label>&nbsp &nbsp
                            <input type="radio" name="status" value="active" checked >Active &nbsp &nbsp
                            <input type="radio" name="status" value="inactive">Inactive
                        </div>
                        <label for="order">Page Order</label>&nbsp &nbsp
                        <input type="integer"  name="order" value="{{$event->order}}" placeholder="order">
                    </div>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-info center-block">Update</button>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#datepicker" ).datepicker();
            $( "#datepicker1" ).datepicker();
        } );
    </script>
@endsection
