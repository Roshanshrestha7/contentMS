@extends('admin.layout.app')

@section('content')
    <section class="content-header">
        <h1>
            Boxed Layout
            <small>Blank example to the boxed layout</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-file"></i> Notice</a></li>
            <li><a href="#">Index</a></li>

            <li><a href="#">view</a></li>
        </ol>
    </section>

    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Notice</h3>

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
                        <td>{{$notice->title}}</td>
                    </tr>
                    <tr>
                        <td>Order</td>
                        <td>{{$notice->order}}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>{{$notice->status}}</td>
                    </tr>
                    <tr>
                        <td>Post_by</td>
                        <td>{{$notice->user->name}}</td>
                    </tr>
                    <tr>
                        <td>Post_at</td>
                        <td>
                            <time class="published" datetime="2016-04-17 12:00:00">
                                {{$notice->created_at->toFormattedDateString()}}
                            </time>
                        </td>
                    </tr>
                    <tr>
                        <td>File</td>
                        <td>
                            <a href="{{asset($notice->file)}}"
                               target="_blank"
                               class="mailbox-attachment-name"><i
                                        class="fa fa-paperclip"></i>
                                Notice File </a>
                            @if(file_exists('uploads/notice/' . $notice))
                                ( <?php echo FileSizeConvert(File::size('uploads/notice/' . $notice));
                                ?>)

                                <?php
                                $ext = File::extension($notice);
                                if ($ext == 'pdf') {
                                    echo "pdf";

                                } elseif ($ext == 'word') {
                                    echo "word";

                                }

                                ?> )
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>{!! $notice->description !!}</td>
                    </tr>
                </table>
                <br>
                <div class="text-center">
                    <a href="{{route('notice.index')}}" class="btn btn-xs btn-info">Back</a>
                </div>
            </div>
            <!-- /.box-body -->

        </div>
        <!-- /.box -->
    </section>


@endsection()