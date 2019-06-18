@extends('admin.layout.app')

@section('content')

    <section class="content-header">
        <h1>
            General Form Elements
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-file"></i> Subscribe</a></li>
            <li><a href="#">Index</a></li>
            <li><a href="#">Send Message</a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Compose Message</h3>
                    </div>

                    {{ Form::open(array('url' => 'admin/newsletter','method' => 'post','enctype' => 'multipart/form-data')) }}
                    @csrf
                    <div class="form-group {{ ($errors->has('title'))?'has-error':'' }}">
                        <label for="title">Title</label>
                        {{Form::text('title',null,['placeholder' => 'Enter Title','class' => 'form-control'])}}
                        {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}
                    </div>
                    <div class="form-group {{ ($errors->has('description'))?'has-error':'' }}">
                        <label for="about">Description</label>
{{--                        {{Form::textarea('description',null,['placeholder' => 'Enter......','class' => 'form-control','id' => 'about'])}}--}}
                        <textarea name="description" id="about" cols="6" rows="6" placeholder="Enter ......" class="form-control"></textarea>
                        {!! $errors->first('description', '<span class="text-danger">:message</span>') !!}
                    </div>
                    <div class="row">

                        <div class="form-group col-md-6 {{ ($errors->has('file'))?'has-error':'' }}">
                            <label for="exampleInputPassword1">File</label>
{{--                                {{Form::file('file',null,['class' => 'form-control'])}}--}}
                            <input type="file" class="form-control" name="file" id="inputEmail3">
                            {!! $errors->first('file', '<span class="text-danger">:message</span>') !!}

                        </div>
                        <div class="form-group col-md-2 {{ ($errors->has('file'))?'has-error':'' }}">
                            <label for="exampleInputPassword1">Date:</label>  &nbsp;
                            <input type="date" class="form-control" name="date">
                            {!! $errors->first('description', '<span class="text-danger">:message</span>') !!}
                        </div>
                    </div>


                        <div class="form-group">
                        <div class="text-center">
                            <button class="btn btn-success">Store</button>
                        </div>
                    </div>
                    {{ Form::close() }}

            </div>
        </div>
    </section>
@endsection