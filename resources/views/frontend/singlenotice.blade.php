@extends('frontend.layout.app')


@section('content')
    <div class="card col-md-12" style=" min-height: 583px; padding-top: 30px;" >
        <div class="card-header">

        </div>
        <div class="box-body" style="padding: 20px">
            <h2>Notice</h2>
        <table>
            <tr>
                <td>Name</td>
                <td>{{$notice->title}}</td>
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
            <a href="{{route('notice')}}" class="btn btn-xs btn-info">Back</a>
        </div>
    </div>
    </div>


@endsection