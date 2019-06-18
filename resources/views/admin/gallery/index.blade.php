@extends('admin.layout.app')
@section('content')

    <section class="content-header">
        <h1>
            Data Tables
            <small>advanced tables</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-envira"></i> Gallery</a></li>
            <li><a href="#">Index</a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Created Gallery</h3>
                        <a href="{{route('gallery.create')}}">
                            <i class="fa fa-plus-circle pull-right" style="font-size: 40px"></i>
                        </a>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-hover dataTable" role="grid"
                                           aria-describedby="example2_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending">
                                                S.N.
                                            </th>

                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending">
                                                Title
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                Status
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="Platform(s): activate to sort column ascending">
                                                Is banner?
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1"
                                                aria-label="Engine version: activate to sort column ascending">
                                                Thumbnail
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1"
                                                aria-label="Engine version: activate to sort column ascending">
                                                Images
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending">
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                            @if($gallery->count()>0)
                                                <?php $i=1; ?>
                                                @foreach($gallery as $galleries)
                                                    <tr>
                                                        <td>{{$i++}}</td>

                                                    <td>{{$galleries->title}}</td>
                                                    <td>@if($galleries->status=='active')
                                                            <a href="{{route('gallery.status',['id' => $galleries->id])}}" class="btn btn-sm btn-success">Active</a>
                                                        @elseif($galleries->status == 'inactive')
                                                            <a href="{{route('gallery.status',['id' => $galleries->id])}}" class="btn btn-sm btn-danger">Inactive</a>
                                                        @endif
                                                    </td>
                                                        <td>@if($galleries->banner=='yes')
                                                                <a href="{{route('gallery.banner',['id' => $galleries->id])}}" class="btn btn-sm btn-success">Yes</a>
                                                            @elseif($galleries->banner == 'no')
                                                                <a href="{{route('gallery.banner',['id' => $galleries->id])}}" class="btn btn-sm btn-danger">No</a>
                                                            @endif
                                                        </td>
                                                    <td>
                                                        @if($galleries->image !== NULL)
                                                            <?php
                                                            $arr = json_decode($galleries->image);
                                                            ?>
                                                            @if($arr!=null)
                                                                @foreach($arr as $key=> $img)

                                                                        <img src="{{asset('storage/uploads/gallery/'. $img)}}" width="50px" height="50px"/>

                                                                    <br>
                                                                @endforeach
                                                            @endif
                                                        @endif

                                                    </td>
                                                        <td>
                                                            {{--<form action="{{url('admin/getImage')}}" method="get">--}}
                                                                {{--<input type="hidden" name="gallery_id" value="{{$galleries->id}}">--}}
                                                                {{--<button type="submit" class="btn btn-info">View Images</button>--}}

                                                            {{--</form>--}}
                                                            <a href="{{url('admin/getImage/'.$galleries->id)}}">view Images</a>
                                                        </td>
                                                    <td>
                                                        <a href="{{route('gallery.edit',['id'=> $galleries->id])}}"><i class="fa fa-edit" style="font-size: 20px"></i></a>&nbsp &nbsp

                                                        {!! Form::open(['method' => 'DELETE', 'route'=>['gallery.destroy',
                                                        $galleries->id],'class'=> 'inline']) !!}
                                                        <button type="submit"
                                                                class="btn btn-danger btn-xs deleteButton actionIcon"
                                                                data-toggle="tooltip"
                                                                data-placement="top" title="Delete"
                                                                onclick="javascript:return confirm('Are you sure you want to delete?');">
                                                            <i class="fa fa-trash-o"></i>
                                                        </button>

                                                        {!! Form::close() !!}

                                                    </td>
                                                    </tr>
                                                @endforeach


                                             @else
                                                <tr>
                                                    <th colspan="7" class="text-center">NO Galleries</th>
                                                </tr>

                                             @endif

                                        </tbody>


                                    </table>
                                </div>
                            </div>
                            <span class="pull-right">{{ $gallery->links() }}</span>


                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->


            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection

