@extends('admin.layout.app')
@section('content')

    <section class="content-header">
        <h1>
            Page Tables
            <small>advanced tables</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-file"></i> Newsletter</a></li>
            <li><a href="#">Index</a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h2 class="box-title">Newsletter</h2>
                        <a href="{{route('newsletter.create')}}" class="btn btn-xs btn-info pull-right">
                            Compose Message
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
                                                File
                                            </th>
                                            <th>
                                                Date
                                            </th>
                                            <th>
                                                Action
                                            </th>
                                            <th>
                                                Send Mail
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($newsletter->count()>0)
                                            <?php $i=1?>
                                            @foreach($newsletter as $newsletters)
                                                <tr>
                                                    <td>{{ $i++ }}</td>

                                                    <td>{{$newsletters->title}}</td>
                                                    <td>
                                                        @if($newsletters->file !== Null)

                                                            <a href="{{asset($newsletters->file)}}"
                                                               target="_blank"
                                                               class="mailbox-attachment-name"><i
                                                                        class="fa fa-paperclip"></i>
                                                                Newsletter File </a>
                                                            @if(file_exists('uploads/newsletter/' . $newsletter))
                                                                ( <?php echo FileSizeConvert(File::size('uploads/newsletter/' . $newsletter));
                                                                ?>)

                                                                <?php
                                                                $ext = File::extension($newsletter);
                                                                if ($ext == 'pdf') {
                                                                    echo "pdf";

                                                                } elseif ($ext == 'word') {
                                                                    echo "word";

                                                                }

                                                                ?> )
                                                            @endif
                                                        @else
                                                               No file
                                                        @endif
                                                    </td>
                                                    <td>{{$newsletters->date}}</td>
                                                    <td>
                                                        <a href="{{route('newsletter.show',['id'=>$newsletters->id])}}"><i class="fa fa-eye" style="font-size: 20px"></i></a>&nbsp &nbsp

                                                        <a href="{{route('newsletter.edit',['id'=> $newsletters->id])}}"><i class="fa fa-edit" style="font-size: 20px"></i></a>&nbsp &nbsp

                                                        {!! Form::open(['method' => 'DELETE', 'route'=>['newsletter.destroy',
                                                        $newsletters->id],'class'=> 'inline']) !!}
                                                        <button type="submit"
                                                                class="btn btn-danger btn-xs deleteButton actionIcon"
                                                                data-toggle="tooltip"
                                                                data-placement="top" title="Delete"
                                                                onclick="javascript:return confirm('Are you sure you want to delete?');">
                                                            <i class="fa fa-trash-o"></i>
                                                        </button>

                                                        {!! Form::close() !!}
                                                    </td>
                                                    <td>
                                                        <!-- Modal -->
                                                        <a id="{{$newsletters->id}}" class="btn  btn-sm btn-primary" data-toggle="tooltip" title="Send Message To Subscriber">Send Now</a>


                                                    </td>


                                                </tr>


                                            @endforeach
                                        @else
                                            <tr>
                                                <th colspan="4" class="text-center">NO Newsletter</th>
                                            </tr>
                                        @endif
                                    </table>
                                    <!-- Modal -->
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
@section('js')
    <div id="showpopup"></div>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.btn-primary').click(function(){
                var id = $(this).attr('id');

                $.ajax({
                    url:"{{url('admin/newletter/getNewsLetterSubscriber')}}",
                    method:"get",
                    data:{appID:id},
                    success:function(data){
                        $('#showpopup').empty().html(data);
                        $("#subs_list").modal("show");
                    }
                });
            });
        });
    </script>
@endsection
