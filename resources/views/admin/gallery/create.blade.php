@extends('admin.layout.app')

@section('content')

<section class="content-header">
    <h1>
        General Form Elements
        <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-envira"></i> Gallery</a></li>
        <li><a href="#">Create Gallery</a></li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Create Gallery</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                {{ Form::open(array('url' => 'admin/page','method' => 'post')) }}
                @csrf
                <div class="box-body">

                    <div class="form-group">
                        <label for="exampleInputPassword1">Title</label>
                        <input type="text" class="form-control" name="title" id="inputEmail3" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" name="image" id="exampleInputFile">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Action</label>&nbsp &nbsp
                        <input type="radio" name="status" value="active" checked >Active &nbsp &nbsp
                        <input type="radio" name="status" value="inactive">Inactive
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