@extends('frontend.layout.app')

@section('content')
    <div class="card col-md-12" style=" min-height: 495px; padding-top: 10px;" >
        <div class="row" style="padding: 30px">

                <h1 style="color: darkred">Notice</h1>

                <table id="example2" class="table table-bordered table-hover table-responsive" role="grid"
                       aria-describedby="example2_info" >
                    <thead>
                    <tr role="row">
                        <th>
                            S.N.
                        </th>
                        <th>
                            Title
                        </th>

                        <th>
                            File
                        </th>

                        <th>
                            Post_at
                        </th>

                    </tr>
                    </thead>
                    <tbody>
                        @if($notice->count()>0)
                            <?php $i=1?>
                            @foreach($notice as $notices)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>
                                        <a href="{{route('singlenotice',['id' => $notices->id])}}">{{$notices->title}}</a>
                                    </td>
                                    <td>
                                        <a href="{{asset($notices->file)}}"
                                          data-target="_blank"
                                           class="mailbox-attachment-name"><i
                                                    class="fa fa-paperclip"></i>
                                            Notice File </a>
                                        @if(file_exists('uploads/notice/' . $notices))
                                            ( <?php echo FileSizeConvert(File::size('uploads/notice/' . $notices));
                                            ?>)

                                            <?php
                                            $ext = File::extension($notices);
                                            if ($ext == 'pdf') {
                                                echo "pdf";

                                            } elseif ($ext == 'word') {
                                                echo "word";

                                            }

                                            ?> )
                                        @endif
                                    </td>

                                    <td>
                                        <time class="published" datetime="2016-04-17 12:00:00">
                                            {{$notices->created_at->toFormattedDateString()}}
                                        </time>
                                    </td>


                                </tr>


                            @endforeach
                        @else
                            <tr>
                                <th colspan="6" class="text-center">NO Notices</th>
                            </tr>
                        @endif
                    </tbody>
                </table>
            <span class="pull-right">{{ $notice->links() }}</span>
        </div>
    </div>
@endsection


