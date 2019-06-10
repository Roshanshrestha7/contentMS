@extends('admin.layout.app')
@section('content')

    <section class="content-header">
        <h1>
            Page Tables
            <small>advanced tables</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-file"></i> User</a></li>
            <li><a href="#">Index</a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Created User</h3>
                        <a href="{{route('user.create')}}">
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
                                                Image
                                            </th>
                                            <th>
                                                Name
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
                                            @foreach($users as $user)
                                                <tr>
                                                    <th>
                                                        <img src="{{asset($user->avatar)}}" width="60px" height="60px" style="border-radius:50%">
                                                    </th>
                                                    <th>{{$user->name}}</th>
                                                    <th>
                                                        @if(Auth::id() !== $user->id)
                                                            @if($user->admin=='0')
                                                                <a href="{{route('user.admin',['id'=>$user->id])}}" class="btn btn-sm btn-success">make admin</a>
                                                            @elseif($user->admin=='1')
                                                                <a href="{{route('user.admin',['id'=>$user->id])}}" class="btn btn-sm btn-danger">remove permission</a>
                                                            @endif
                                                        @endif
                                                    </th>
                                                    <th>
                                                        @if(Auth::id() !== $user->id)
                                                            {!! Form::open(['method' => 'DELETE', 'route'=> ['user.destroy',$user->id], 'class'=> 'inline']) !!}
                                                            <button type="submit"
                                                                    class="btn btn-danger btn-xs deleteButton actionIcon"
                                                                    data-toggle="tooltip"
                                                                    data-placement="top" title="Delete"
                                                                    onclick="javascript:return confirm('Are you sure you want to delete?');">
                                                                <i class="fa fa-trash-o"></i>
                                                            </button>

                                                            {!! Form::close() !!}
                                                        @endif
                                                    </th>
                                                </tr>

                                            @endforeach
                                        </tbody>
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

