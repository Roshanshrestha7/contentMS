@extends('admin.layout.app')
@section('content')
<section class="content" style="min-height: 230px">
    <div class="card">
        <div class="col-md-12">
            <div class="col-md-4" style="padding: 30px" >
                <div class="card-header">
                    <h4 class="text-center">Published Pages</h4>
                </div>
                <div class="card-body">
                    <h2 class="text-center">{{$pages_count}}</h2>
                </div>
            </div>
            <div class="col-md-4" style="padding: 30px" >
                <div class="card-header">
                    <h4 class="text-center">Published Notices</h4>
                </div>
                <div class="card-body">
                    <h2 class="text-center">{{$notice_count}}</h2>
                </div>
            </div>
            <div class="col-md-4" style="padding: 30px" >
                <div class="card-header">
                    <h4 class="text-center">Published Events</h4>
                </div>
                <div class="card-body">
                    <h2 class="text-center">{{$event_count}}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="col-md-4" style="padding: 30px" >
                <div class="card-header">
                    <h4 class="text-center">Published Galleries</h4>
                </div>
                <div class="card-body">
                    <h2 class="text-center">{{$gallery_count}}</h2>
                </div>
            </div>
            <div class="col-md-4" style="padding: 30px" >
                <div class="card-header">
                    <h4 class="text-center">Published Images</h4>
                </div>
                <div class="card-body">
                    <h2 class="text-center">{{$image_count}}</h2>
                </div>
            </div>
            <div class="col-md-4" style="padding: 30px" >
                <div class="card-header">
                    <h4 class="text-center"> Users</h4>
                </div>
                <div class="card-body">
                    <h2 class="text-center">{{$user_count}}</h2>
                </div>
            </div>

        </div>
        <div class="col-md-12">
            <div class="col-md-4" style="padding: 30px" >
                <div class="card-header">
                    <h4 class="text-center">Subscribers</h4>
                </div>
                <div class="card-body">
                    <h2 class="text-center">{{$subscribe_count}}</h2>
                </div>
            </div>

            <div class="col-md-4" style="padding: 30px" >
                <div class="card-header">
                    <h4 class="text-center">Message</h4>
                </div>
                <div class="card-body">
                    <h2 class="text-center">{{$message_count}}</h2>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection()

