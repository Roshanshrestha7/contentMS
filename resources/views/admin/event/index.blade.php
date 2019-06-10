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
                                                Banner
                                            </th>
                                            <th>
                                                From
                                            </th>
                                            <th>
                                                To
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

