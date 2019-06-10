@extends('admin.layout.app')
@section('content')

    <section class="content-header">
        <h1>
            Page Tables
            <small>advanced tables</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-file"></i> Notice</a></li>
            <li><a href="#">Index</a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Created Notice</h3>
                        <a href="{{route('notice.create')}}">
                            <i class="fa fa-plus-circle pull-right" style="font-size: 40px"></i>
                        </a>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2" class="table table-bordered table-hover table-responsive" role="grid"
                                           aria-describedby="example2_info">
                                        <thead>
                                        <tr role="row">
                                            <th>
                                                S.N.
                                            </th>
                                            <th>
                                                Title
                                            </th>

                                            <th>
                                                File
                                            </th>
                                            <th>
                                                Post_by
                                            </th>
                                            <th>
                                                Post_at
                                            </th>
                                            <th>
                                                Status
                                            </th>
                                            <th>
                                                Order
                                            </th>
                                            <th>
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($notice->count()>0)
                                            <?php $i=1?>
                                            @foreach($notice as $notices)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>
                                                        {{$notices->title}}

                                                    </td>
                                                    <td>
                                                        <a href="{{asset($notices->file)}}"
                                                           target="_blank"
                                                           class="mailbox-attachment-name"><i
                                                                    class="fa fa-paperclip"></i>
                                                            Notice File </a>
                                                        @if(file_exists('uploads/notice/' . $notices))
                                                            ( <?php echo FileSizeConvert(File::size('uploads/notice/' . $notices));
                                                            ?>)

                                                            <?php
                                                            $ext = File::extension($notices);
                                                            if ($ext == 'pdf') {
                                                                echo "pdf";

                                                            } elseif ($ext == 'word') {
                                                                echo "word";

                                                            }

                                                            ?> )
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{$notices->user->name}}
                                                    </td>
                                                    <td>
                                                        <time class="published" datetime="2016-04-17 12:00:00">
                                                            {{$notices->created_at->toFormattedDateString()}}
                                                        </time>
                                                    </td>
                                                    <td>
                                                        @if($notices->status=='active')
                                                            <a href="{{route('notice.status',['id' => $notices->id])}}" class="btn btn-sm btn-success">Active</a>
                                                        @elseif($notices->status == 'inactive')
                                                            <a href="{{route('notice.status',['id' => $notices->id])}}" class="btn btn-sm btn-danger">Inactive</a>
                                                        @endif
                                                    </td>
                                                    <td>{{$notices->order}}</td>
                                                    <td>
                                                        <a href="{{route('notice.show',['id'=> $notices->id])}}"><i class="fa fa-eye" style="font-size: 20px"></i></a>&nbsp &nbsp

                                                        <a href="{{route('notice.edit',['id'=> $notices->id])}}"><i class="fa fa-edit" style="font-size: 20px"></i></a>&nbsp &nbsp

                                                        {!! Form::open(['method' => 'DELETE', 'route'=>['notice.destroy',
                                                                                                                $notices->id],'class'=> 'inline']) !!}
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
                                                <th colspan="6" class="text-center">NO Notices</th>
                                            </tr>

                                        @endif

                                    </table>
                                </div>
                            </div>

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

