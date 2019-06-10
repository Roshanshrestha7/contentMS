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
            <li><a href="#">Image Collection</a></li>
            <li><a href="#">Upload Images</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Upload Images</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    @include('admin.includes.error')

                    {{ Form::open(array('url' => 'admin/image','method' => 'post','enctype' => 'multipart/form-data')) }}
                    @csrf
                    {{--<input type="" name="gallery_id" value="image->gallery_id">--}}
                    <div class="box-body">
                    <div class="form-group">
                        <input type="hidden" name="gallery_id"  value="{{$gallery->id}}">

                    </div>

                        <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <input type="file" name="image[]" class="form-control" multiple>

                        </div>
                        <div class="form-group">
                            <div class="col-md-5">
                                <label for="exampleInputFile">Status</label>&nbsp &nbsp <br>
                                <input type="radio" name="status" value="active" checked >Active &nbsp &nbsp
                                <input type="radio" name="status" value="inactive">Inactive
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