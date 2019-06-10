@extends('admin.layout.app')

@section('content')

    <section class="content-header">
        <h1>
            General Form Elements
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-file"></i> Notice</a></li>
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
                        <h3 class="box-title">Create Notice</h3>
                    </div>
                @include('admin.includes.error')

                <!-- /.box-header -->
                    <!-- form start -->
                    {{ Form::open(array('url' => 'admin/notice','method' => 'post','enctype' => 'multipart/form-data')) }}
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
                            <label for="exampleInputPassword1">File</label>
                            <input type="file" class="form-control" name="file" id="inputEmail3">
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