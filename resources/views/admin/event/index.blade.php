@extends('admin.layout.app')
@section('content')

    <section class="content-header">
        <h1>
            Page Tables
            <small>advanced tables</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-file"></i> Event</a></li>
            <li><a href="#">Index</a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Created Event</h3>
                        <a href="{{route('event.create')}}">
                            <i class="fa fa-plus-circle pull-right" style="font-size: 40px"></i>
                        </a>
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
                                                Title
                                            </th>

                                            <th>
                                                Banner
                                            </th>
                                            <th>
                                                Date
                                            </th>

                                            <th>
                                                Time
                                            </th>
                                            <th>
                                                Post_by
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
                                        @if($events->count()>0)
                                            <?php $i=1?>
                                            @foreach($events as $event)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>
                                                        {{$event->title}}

                                                    </td>
                                                    <td>
                                                        <a class="fancybox" rel="gallery1" href="{{asset($event->image)}}" title="Twilight Memories (doraartem)">

                                                        <img src="{{asset($event->image)}}" width="100px" height="60px" >
                                                        </a>
                                                    </td>
                                                    <td>
                                                        {{$event->from_date}} -{{$event->to_date}}
                                                    </td>

                                                    <td>
                                                        {{$event->start_time}} - {{$event->end_time}}
                                                    </td>
                                                    <td>
                                                        {{$event->user->name}}
                                                    </td>

                                                    <td>
                                                        @if($event->status=='active')
                                                            <a href="{{route('event.status',['id' => $event->id])}}" class="btn btn-sm btn-success">Active</a>
                                                        @elseif($event->status == 'inactive')
                                                            <a href="{{route('event.status',['id' => $event->id])}}" class="btn btn-sm btn-danger">Inactive</a>
                                                        @endif
                                                    </td>
                                                    <td>{{$event->order}}</td>
                                                    <td>
                                                        <a href="{{route('event.show',['id' => $event->id])}}"><i class="fa fa-eye" style="font-size: 20px"></i></a>&nbsp &nbsp

                                                        <a href="{{route('event.edit',['id' => $event->id])}}"><i class="fa fa-edit" style="font-size: 20px"></i></a>&nbsp &nbsp

                                                        {!! Form::open(['method' => 'DELETE', 'route'=>['event.destroy',
                                                                                                                $event->id],'class'=> 'inline']) !!}
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
                                                <th colspan="6" class="text-center">NO Events</th>
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

