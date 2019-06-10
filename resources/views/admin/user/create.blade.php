@extends('admin.layout.app')

@section('content')
    <section class="content-header">
        <h1>
            General Form Elements
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-file"></i>User</a></li>
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
                        <h3 class="box-title">Create User</h3>
                    </div>
                @include('admin.includes.error')

                <!-- /.box-header -->
                    <!-- form start -->
                    {{ Form::open(array('url' => 'admin/user','method' => 'post','enctype'=>'multipart/form-data')) }}
                    @csrf
                    <div class="box-body">

                        <div class="form-group {{ ($errors->has('name'))?'has-error':'' }}">
                            <label for="exampleInputPassword1">User Name </label>
                            <input type="text" class="form-control" name="name" id="inputEmail3" placeholder="name">
                            {!! $errors->first('name', '<span class="text-danger">:message</span>') !!}
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">User Image</label>
                            <input type="file" class="form-control" name="avatar" id="inputEmail3">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Email</label>
                            <input type="email" class="form-control" name="email" id="inputEmail3" placeholder="email">
                        </div>


                    </div>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-info center-block">Register</button>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </section>


@endsection