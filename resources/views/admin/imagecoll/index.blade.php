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
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <a href="{{url('admin/createImages/'.$gallery->id)}}" class="btn btn-info b"><i class="fa fa-upload"></i>&nbsp Upload Images</a>
                    </div>
                    <div class="box-body">

                        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2" class="table table-bordered table-hover dataTable" role="grid"
                                           aria-describedby="example2_info">
                                        <thead>
                                            <h4>Images</h4>
                                        </thead>
                                        <tbody>

                                        @if($images->count()>0)
                                            {{--<h2>Gallery Title: {{$images->galleryTitle->title}}</h2>--}}
                                            @foreach($images as $image)
                                                    <?php
                                                    $arr = json_decode($image->image);
                                                    ?>
                                                    @if($arr!=null)
                                                        @foreach($arr as $key=> $img)
                                                         <div class="col-sm-6">
                                                            <img src="{{asset('storage/uploads/images/'. $img)}}" width="250px" height="200px"/>
                                                             <div>
                                                                 {!! Form::open(['method' => 'DELETE', 'route'=>['image.destroy',
                                                                 $image->id],'class'=> 'inline']) !!}
                                                                 <button type="submit"
                                                                         class="btn btn-danger btn-xs deleteButton actionIcon"
                                                                         data-toggle="tooltip"
                                                                         data-placement="top" title="Delete"
                                                                         onclick="javascript:return confirm('Are you sure you want to delete?');">
                                                                     <i class="fa fa-trash-o"></i>
                                                                 </button>

                                                                 {!! Form::close() !!}
                                                             </div>
                                                             <br>

                                                         </div>
                                                        @endforeach
                                                    @endif
                                                    <br>
                                                    <br>
                                            @endforeach
                                        @else
                                            <th  class="text-center">NO Images</th>

                                        @endif

                                        </tbody>


                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>




                </div>
            </div>
        </div>
    </section>



@endsection