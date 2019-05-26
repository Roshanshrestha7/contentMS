@include('admin.layout.head')
    @include('admin.layout.foot')


<section class="content">



<!-- Default box -->
    <div class="container">
        <div class="row-justify-content-center">
            <div class="col-lg-8">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">{{ $page->name }}</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <h3>Image</h3>
                            <div class="post-thumb">

                                @if($page->	banner !== NULL)
                                    <?php
                                    $arr = json_decode($page->banner);
                                    ?>

                                    @foreach($arr as $key=> $banner)
                                        @if(file_exists('storage/uploads/page/' . $banner))

                                            <img src="{{URL::to('test'. $banner)}}" width="300px" height="300px"/> &nbsp; &nbsp;

                                        @endif
                                    @endforeach


                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <h3>Description</h3>
                            <div>
                                <p>{{ $page->description }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="{{route('pages')}}" class="btn btn-sm btn-info">back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.box -->

</section>