@extends('frontend.layout.app')

@section('content')

        <div class="card" style="background-color: lightgrey; min-height: 600px; padding-top: 70px; padding-left: 10px" >
            @if($images->count()>0)
                @foreach($images as $image)
                    <?php
                    $arr = json_decode($image->image);
                    ?>
                    @if($arr!=null)
                        @foreach($arr as $key=> $img)
                            <div class="col-md-3 col-sm-12" style="padding: 10px; border-radius: 3%;">
                                <div class="simage">
                                    <a class="fancybox" rel="gallery1" href="{{asset('storage/uploads/images/'. $img)}}" title="Twilight Memories (doraartem)">
                                        <img src="{{asset('storage/uploads/images/'. $img)}}" style="width:100%; height: 200px; border-radius: 3%;" data-target="_blank" alt="" />
                                    </a>



                                </div>
                            </div>
                        @endforeach
                    @endif
                @endforeach
            @else
                <div class="card">
                    <h3 style="text-align: center;">!! NO Images !!</h3>
                </div>
            @endif
        </div>

@endsection