@extends('admin.layout.app')
@section('content')
    @include('admin.includes.error')


    <section class="content-header">
        <h1>
            Edit Page
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Page</li>
        </ol>
    </section>
    <section class="content">
        <!-- general form elements -->
        <div class="box box-primary">

            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">

                <form role="form" action="{{route('page.update',['id' => $page->id])}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="for-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" name="name" value="{{$page->name}}" class="form-control" id="exampleInputEmail1" placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Image</label>
                                <br>
                                @if($page->	banner !== NULL)
                                    <?php
                                    $arr = json_decode($page->banner);
                                    ?>

                                    @foreach($arr as $key=> $banner)
                                        @if(file_exists('storage/uploads/page/' . $banner))

                                            <img src="{{URL::to('storage/uploads/page/'. $banner)}}"/>

                                        @endif


                                    @endforeach


                                @endif
                            </div>
                            <div class=" form-group">
                                <label for="banner" >File input</label>
                                <input type="file" name="banner[]"  value="{{$page->banner}}" class="form-control" multiple>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                            </div>
                            <textarea name="description" id="" cols="43" rows="5" placeholder="Enter description">{{$page->description}}</textarea>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Satus</label>
                                <input type="radio" name="status" value="active" checked>Active
                                <input type="radio" name="status" value="inactive">Inactive
                            </div>


                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Store</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.box-body -->


        </div>
        <!-- /.box -->
    </section>




@endsection

