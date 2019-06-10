@extends('admin.layout.app')
@section('content')

    <section class="content-header">
        <h1>
            Page Tables
            <small>advanced tables</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-file"></i> Page</a></li>
            <li><a href="#">Index</a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Created Pages</h3>
                        <a href="{{route('page.create')}}">
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
                                                Parent Page
                                            </th>
                                            <th>
                                                Page
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
                                        @if($page->count()>0)
                                            <?php $i=1?>
                                            @foreach($page as $pages)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>
                                                        @if(isset($pages->parentPage->title))
                                                            {{$pages->parentPage->title}}
                                                            @else
                                                            <label class="text text-danger">Is A parent Page</label>
                                                        @endif

                                                    </td>
                                                    <td>{{$pages->title}}</td>
                                                    <td>
                                                        @if($pages->status=='active')
                                                            <a href="{{route('page.status',['id' => $pages->id])}}" class="btn btn-sm btn-success">Active</a>
                                                        @elseif($pages->status == 'inactive')
                                                            <a href="{{route('page.status',['id' => $pages->id])}}" class="btn btn-sm btn-danger">Inactive</a>
                                                        @endif
                                                    </td>
                                                    <td>{{$pages->order}}</td>
                                                    <td>
                                                        <a href="{{route('page.show',['id'=> $pages->id])}}"><i class="fa fa-eye" style="font-size: 20px"></i></a>&nbsp &nbsp
                                                        <a href="{{route('page.edit',['id'=> $pages->id])}}"><i class="fa fa-edit" style="font-size: 20px"></i></a>&nbsp &nbsp

                                                        {!! Form::open(['method' => 'DELETE', 'route'=>['page.destroy',
                                                        $pages->id],'class'=> 'inline']) !!}
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
                                                <th colspan="6" class="text-center">NO Pages</th>
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

