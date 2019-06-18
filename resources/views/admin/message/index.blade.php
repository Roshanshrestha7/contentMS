@extends('admin.layout.app')
@section('content')

    <section class="content-header">
        <h1>
            Page Tables
            <small>advanced tables</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-file"></i> Message</a></li>
            <li><a href="#">Index</a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h2 class="box-title">Messages</h2>
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
                                                Name
                                            </th>
                                            <th>
                                                Email-Id
                                            </th>
                                            <th>
                                                Message
                                            </th>

                                            <th>
                                                Action
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($contact->count()>0)
                                            <?php $i=1?>
                                            @foreach($contact as $contacts)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{$contacts->name}}</td>
                                                    <td>{{$contacts->email}}</td>
                                                    <td>{{$contacts->message}}</td>
                                                    <td>

                                                        {!! Form::open(['method' => 'DELETE', 'route'=>['contact.destroy',
                                                        $contacts->id],'class'=> 'inline']) !!}
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
                                                <th colspan="4" class="text-center">NO Messages</th>
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

