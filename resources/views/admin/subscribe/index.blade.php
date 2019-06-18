@extends('admin.layout.app')
@section('content')

    <section class="content-header">
        <h1>
            Page Tables
            <small>advanced tables</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-file"></i> Subscribe</a></li>
            <li><a href="#">Index</a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h2 class="box-title">Subscribers</h2>

                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">

                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-hover table-responsive" role="grid"
                                           aria-describedby="example2_info">
                                        <thead>
                                        <tr role="row">
                                            <th>
                                                S.N.
                                            </th>
                                            <th>
                                                Email-Id
                                            </th>
                                            <th>
                                                Status
                                            </th>

                                            <th>
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($subscribe->count()>0)
                                            <?php $i=1?>
                                            @foreach($subscribe as $subscribes)
                                                <tr>
                                                    <td>{{ $i++ }}</td>

                                                    <td>{{$subscribes->email}}</td>
                                                    <td>
                                                        @if($subscribes->status=='active')
                                                            <a href="{{route('subscribe.status',['id' => $subscribes->id])}}" class="btn btn-sm btn-success">Active</a>
                                                        @elseif($subscribes->status == 'inactive')
                                                            <a href="{{route('subscribe.status',['id' => $subscribes->id])}}" class="btn btn-sm btn-danger">Inactive</a>
                                                        @endif
                                                    </td>

                                                    <td>

                                                        {!! Form::open(['method' => 'DELETE', 'route'=>['subscribe.destroy',
                                                        $subscribes->id],'class'=> 'inline']) !!}
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
                                                <th colspan="4" class="text-center">NO Subscribers</th>
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

