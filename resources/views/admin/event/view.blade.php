@extends('admin.layout.app')

@section('content')
    <section class="content-header">
        <h1>
            Boxed Layout
            <small>Blank example to the boxed layout</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-file"></i> Event</a></li>
            <li><a href="#">Index</a></li>

            <li><a href="#">view</a></li>
        </ol>
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Event</h3>

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
                        <td>{{$event->title}}</td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td>{{$event->from_date}} - {{$event->to_date}}</td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td>{{$event->start_time}} - {{$event->end_time}}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>{{$event->status}}</td>
                    </tr>
                    <tr>
                        <td>Order</td>
                        <td>{{$event->order}}</td>
                    </tr>
                    <tr>
                        <td>Post_by</td>
                        <td>{{$event->user->name}}</td>
                    </tr>
                    <tr>
                        <td>Post_at</td>
                        <td>
                            <time class="published" datetime="2016-04-17 12:00:00">
                                {{$event->created_at->toFormattedDateString()}}
                            </time>
                        </td>
                    </tr>
                    <tr>
                        <td>File</td>
                        <td>
                            <a class="fancybox" rel="gallery1" href="{{asset($event->image)}}" title="Twilight Memories (doraartem)">
                                <img src="{{asset($event->image)}}" width="100px" height="60px" >
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>{!! $event->description !!}</td>
                    </tr>
                </table>
                <br>
                <div class="text-center">
                    <a href="{{route('event.index')}}" class="btn btn-xs btn-info">Back</a>
                </div>
            </div>
            <!-- /.box-body -->

        </div>
        <!-- /.box -->
    </section>


@endsection()