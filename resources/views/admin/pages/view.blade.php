@extends('admin.layout.app')

@section('content')
    <section class="content-header">
        <h1>
            Boxed Layout
            <small>Blank example to the boxed layout</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-file"></i> Page</a></li>
            <li><a href="#">Index</a></li>

            <li><a href="#">view</a></li>
        </ol>
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Page</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <table>
                    <tr>
                        <td>Name</td>
                        <td>{{$page->title}}</td>
                    </tr>
                    <tr>
                        <td>Order</td>
                        <td>{{$page->order}}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>{{$page->status}}</td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>{{$page->description}}</td>
                    </tr>
                </table>
                <br>
                <div class="text-center">
                <a href="{{route('page.index')}}" class="btn btn-xs btn-info">Back</a>
                </div>
            </div>
            <!-- /.box-body -->

        </div>
        <!-- /.box -->
    </section>


@endsection()