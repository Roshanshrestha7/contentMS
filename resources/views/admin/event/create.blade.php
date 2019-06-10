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
            <li><a href="#">Create</a></li>
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
                @include('admin.includes.error')

                <!-- /.box-header -->
                    <!-- form start -->
                    {{ Form::open(array('url' => 'admin/event','method' => 'post','enctype' => 'multipart/form-data')) }}
                    @csrf
                    <div class="box-body">

                        <div class="form-group">
                            <label for="exampleInputPassword1">Title</label>
                            <input type="text" class="form-control" name="title" id="inputEmail3" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Description</label>
                            <textarea  name="description" placeholder="Place some text here"
                                       style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Banner-Image</label>
                            <input type="file" class="form-control" name="banner" id="inputEmail3">
                        </div>
                        <div class="col-md-12">
                            <div class="form-group col-md-4">
                                {!! Form::text('event_from',null,['class'=>'form-control','id'=>'datepicker','placeholder' => 'event from date','autocomplete' => 'off']) !!}
                                {{--<label for="exampleInputPassword1">Event-From</label>--}}
                                {{--{!! Form::text('event_from', '', array('id' => 'datepicker')) !!}--}}
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputPassword1">Event-To</label>
                                <input type="text" class="form-control" name="event_to">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleInputPassword1">Time</label>
                                <input type="number" class="form-control" name="time" id="inputEmail3">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Venue</label>
                            <input type="text" class="form-control" name="venue" id="inputEmail3" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Action</label>&nbsp &nbsp
                            <input type="radio" name="status" value="active" checked >Active &nbsp &nbsp
                            <input type="radio" name="status" value="inactive">Inactive
                        </div>
                        <label for="order">Page Order</label>&nbsp &nbsp
                        <input type="integer"  name="order" placeholder="order">
                    </div>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-info center-block">Store</button>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </section>
@endsection
{{--@section('js')--}}
    {{--<script type="text/javascript">--}}
        {{--$(function() {--}}
            {{--$( "#datepicker" ).datepicker({--}}
                {{--changeMonth: true,--}}
                {{--changeYear: true--}}
            {{--});--}}
        {{--});--}}
    {{--</script>--}}
    {{--@endsection--}}
