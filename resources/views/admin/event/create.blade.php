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

                <!-- /.box-header -->
                    <!-- form start -->
                    {{ Form::open(array('url' => 'admin/event','method' => 'post','enctype' => 'multipart/form-data')) }}
                    @csrf
                    <div class="box-body">

                        <div class="row">

                                <div class="form-group {{ ($errors->has('title'))?'has-error':'' }}">
                                    <label for="exampleInputPassword1">Title</label>
                                    {{Form::text('title',null,['class' => 'form-control','placeholder' => 'Title'])}}
                                    {{--<input type="text" class="form-control" name="title" id="inputEmail3" placeholder="Title">--}}
                                    {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}

                                </div>
                                <div class="form-group {{ ($errors->has('description'))?'has-error':'' }}">
                                    <label for="exampleInputFile">Description</label>
                                    {{Form::textarea('description',null,['class' => 'form-control','placeholder' => 'Description'])}}
                                    {{--<textarea  name="description" placeholder="Place some text here"--}}
                                               {{--style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>--}}
                                    {!! $errors->first('description', '<span class="text-danger">:message</span>') !!}


                                </div>

                                <div class="form-group {{ ($errors->has('image'))?'has-error':'' }}">
                                    <label for="exampleInputPassword1">Banner-Image</label>
                                    {{Form::file('image',null,['class' => 'form-control'])}}

                                    {{--<input type="file" class="form-control" name="image" id="inputEmail3">--}}
                                    {!! $errors->first('image', '<span class="text-danger">:message</span>') !!}

                                </div>
                        </div>
                        <div class="row col-md-12">
                            <label style="color: darkred">Event Details</label>
                        </div>
                        <div class="row">
                                <div class="form-group col-md-3 {{ ($errors->has('from_date'))?'has-error':'' }}">
                                    <label for="exampleInputPassword1">Event-From</label>
                                    {{Form::text('from_date',null,['class' => 'form-control','placeholder' => 'Start Date','id'=>'datepicker'])}}

                                    {{--<input type="text" class="form-control" name="from_date" id="datepicker">--}}
                                    {!! $errors->first('from_date', '<span class="text-danger">:message</span>') !!}


                                </div>
                                <div class="form-group col-md-3 {{ ($errors->has('to_date'))?'has-error':'' }}">
                                    <label for="exampleInputPassword1">Event-To</label>
                                    {{Form::text('to_date',null,['class' => 'form-control','id'=>'datepicker1','placeholder' => 'End Date'])}}

                                    {{--<input type="text" class="form-control" name="to_date" id="datepicker1">--}}
                                    {!!$errors->first('to_date', '<span class="text-danger">:message</span>') !!}

                                </div>
                                <div class="form-group col-md-3 {{ ($errors->has('start_time'))?'has-error':'' }}">
                                    <label for="exampleInputPassword1">Start-Time</label>
                                    {{Form::text('start_time',null,['class' => 'form-control','placeholder' => 'Start Time'])}}

                                    {{--<input class="form-control" name="start_time" type="text">--}}
                                    {!! $errors->first('start_time', '<span class="text-danger">:message</span>') !!}

                                </div>
                            <div class="form-group col-md-3 {{ ($errors->has('end_time'))?'has-error':'' }}">
                                <label for="exampleInputPassword1">End-Time</label>
                                {{Form::text('end_time',null,['class' => 'form-control','placeholder' => 'End Date'])}}

                                {{--<input class="form-control" name="end_time" type="text">--}}
                                {!! $errors->first('end_time', '<span class="text-danger">:message</span>') !!}

                            </div>
                        </div>
                        <div class="form-group {{ ($errors->has('venue'))?'has-error':'' }}">
                            <label for="exampleInputPassword1">Venue</label>
                            {{Form::text('venue',null,['class' => 'form-control','placeholder' => 'Venue'])}}

                            {{--<input type="text" class="form-control" name="venue" id="inputEmail3" >--}}
                            {!! $errors->first('venue', '<span class="text-danger">:message</span>') !!}

                        </div>
                        <div class="form-group ">
                            <label for="exampleInputFile">Action</label>&nbsp &nbsp
                            {{Form::radio('status', 'active',true,['class'=>'minimal-red'])}} Active
                            &nbsp;&nbsp;&nbsp;
                            {{Form::radio('status', 'inactive',null,['class'=>'minimal-red'])}} Inactive
                            {{--<input type="radio" name="status" value="active" checked >Active &nbsp &nbsp--}}
                            {{--<input type="radio" name="status" value="inactive">Inactive--}}
                        </div>
                        <div class="form-group {{ ($errors->has('order'))?'has-error':'' }}">
                            <label for="order">Page Order</label>&nbsp &nbsp
                            {{Form::number('order',null,['placeholder' => 'Order'])}}

                            {{--<input type="integer"  name="order" placeholder="order">--}}
                            {!! $errors->first('order', '<span class="text-danger">:message</span>') !!}
                        </div>
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
@section('js')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#datepicker" ).datepicker();
            $( "#datepicker1" ).datepicker();
        } );
    </script>
@endsection
