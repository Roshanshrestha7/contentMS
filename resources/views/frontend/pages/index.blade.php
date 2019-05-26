@extends('frontend.layout.app')
@section('content')
    <section class="content">
        <div class="card mb-3">
               <img style="height: 300px; width: 100%; display: block;" src="{{asset('uploads/ss.jpg')}}" alt="Card image">

               <div class="card-footer text-muted">
                   pages
               </div>
               <div class="card-body col-lg-12">
                   <div class="container cta-100 ">
                       <div class="container">
                           <div class="row blog">
                               <div class="col-md-12">
                                   <div id="blogCarousel" class="carousel slide container-blog" data-ride="carousel">
                                       <ol class="carousel-indicators">
                                           <li data-target="#blogCarousel" data-slide-to="0" class="active"></li>
                                           <li data-target="#blogCarousel" data-slide-to="1"></li>
                                       </ol>
                                       <!-- Carousel items -->

                                       <div class="carousel-inner">
                                           <div class="carousel-item active">
                                               <div class="row">
                                                   @foreach($page as $pag)
                                                       <div class="col-lg-6" >
                                                           <div class="item-box-blog">
                                                               <div class="form-group">
                                                                   <h3>Image</h3>
                                                                   <div class="dropdown">

                                                                       @if($pag->banner !== NULL)
                                                                           <?php
                                                                           $arr = json_decode($pag->banner);
                                                                           ?>

                                                                           @foreach($arr as $key=> $banner)
                                                                               @if(file_exists('test' . $banner))

                                                                                   <img src="{{URL::to('storage/uploads/page/'. $banner)}}" width="100" height="50"/> &nbsp; &nbsp;

                                                                               @endif
                                                                           @endforeach


                                                                       @endif
                                                                       <div class="dropdown-content">
                                                                           @if($pag->banner !== NULL)
                                                                               <?php
                                                                               $arr = json_decode($pag->banner);
                                                                               ?>

                                                                               @foreach($arr as $key=> $banner)
                                                                                   @if(file_exists('storage/uploads/page/' . $banner))

                                                                                       <img src="{{URL::to('storage/uploads/page/'. $banner)}}" width="200" height="100"/> &nbsp; &nbsp;

                                                                                   @endif
                                                                               @endforeach


                                                                           @endif
                                                                               <div class="desc">Beautiful Cinque Terre</div>

                                                                       </div>
                                                                   </div>
                                                               </div>
                                                               <div class="item-box-blog-body">
                                                                   <!--Heading-->
                                                                   <div class="item-box-blog-heading">
                                                                       <a href="" tabindex="0">
                                                                           <h5>{{$pag->name}}</h5>
                                                                       </a>
                                                                   </div>
                                                                   <!--Data-->
                                                                   <!--Text-->

                                                                   <div class="mt">
                                                                       <a href="{{route('single',['id' => $pag->id ])}}" tabindex="0" class="btn bg-blue-ui white read">read more</a>
                                                                   </div>
                                                                   <!--Read More Button-->
                                                               </div>
                                                           </div>
                                                       </div>
                                                   @endforeach
                                               </div>
                                               <!--.row-->
                                           </div>
                                           <!--.item-->
                                           <!--.item-->
                                       </div>
                                       <!--.carousel-inner-->
                                   </div>
                                   <!--.Carousel-->
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
        </div>
    </section>

@endsection








