@extends('admin.layout.app')

@section('content')

    <section class="content-header">
        <h1>
            General Form Elements
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-envira"></i> Gallery</a></li>
            <li><a href="#">index</a></li>
            <li><a href="#">Edit Gallery</a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Gallery</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    {!! Form::model($gallery,['method'=>'put','route'=>['gallery.update',$gallery],'enctype'=>'multipart/form-data','file'=>true]) !!}
                    @csrf
                    <div class="box-body">

                        <div class="form-group">
                            <label for="exampleInputPassword1">Title</label>
                            <input type="text" class="form-control" value="{{ $gallery->title }}" name="title" id="inputEmail3" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <input type="file" name="image[]" class="form-control" multiple>

                        </div>
                        <div class="form-group">
                            <div class="col-md-5">
                                <label for="status"> Active ?</label><br>
                                {{Form::radio('status', 'active',true,['class'=>'minimal-red'])}} Active
                                {{Form::radio('status', 'inactive',null,['class'=>'minimal-red'])}} Inactive
                            </div>
                            <div class="col-md-5">
                                <label for="banner"> Is banner ?</label><br>
                                {{Form::radio('banner', 'yes',true,['class'=>'minimal-red'])}}Yes
                                &nbsp;&nbsp;&nbsp;
                                {{Form::radio('banner', 'no',null,['class'=>'minimal-red'])}} No
                            </div>
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