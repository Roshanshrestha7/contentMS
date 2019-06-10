@extends('admin.layout.app')
@section('content')

    <section class="content-header">
        <h1>
            Page Tables
            <small>advanced tables</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-file"></i> User</a></li>
            <li><a href="#">Index</a></li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="{{asset(Auth::user()->avatar)}}" alt="User profile picture">

                        <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

                        <p class="text-muted text-center">Software Enginee</p>
                        <p class="text-muted text-center">{{Auth::user()->email}}</p>


                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li ><a href="#activity" data-toggle="tab">Edit profile</a></li>
                        <li class="active"><a href="#settings" data-toggle="tab">Change Password</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane" id="activity">
                            <!-- Post -->
                            <div class="box box-primary">


                                <!-- /.box-header -->
                                    <!-- form start -->
                                    {!! Form::model($user,['method'=>'put','route'=>['user.update',$user],'enctype'=>'multipart/form-data']) !!}
                                    @csrf
                                    <div class="box-body">

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">User Name</label>
                                            <input type="text" class="form-control" value="{{$user->name}}" name="name" id="inputEmail3" placeholder="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">User Image</label>
                                            <input type="file" class="form-control" name="avatar" id="inputEmail3">
                                        </div>

                                    </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-info center-block">Update Profile</button>
                            </div>
                            {{Form::close()}}
                            </div>

                        </div>


                        <div class="active tab-pane" id="settings">
                            <div class="box box-primary">
                                <!-- form start -->
                                        <div class="panel-body">
                                            @if (session('error'))
                                                <div class="alert alert-danger">
                                                    {{ session('error') }}
                                                </div>
                                            @endif
                                            @if (session('success'))
                                                <div class="alert alert-success">
                                                    {{ session('success') }}
                                                </div>
                                            @endif
                                            <form class="form-horizontal" method="POST" action="{{ route('changePassword') }}">
                                                {{ csrf_field() }}

                                                <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                                    <label for="new-password" class="col-md-4 control-label">Current Password</label>

                                                    <div class="col-md-6">
                                                        <input id="current-password" type="password" class="form-control" name="current-password" required>
                                                        @if ($errors->has('new-password'))
                                                            <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                                        @endif
                                                    </div>

                                                </div>

                                                <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                                    <label for="new-password" class="col-md-4 control-label">New Password</label>

                                                    <div class="col-md-6">
                                                        <input id="new-password" type="password" class="form-control" name="new-password" required>

                                                        @if ($errors->has('new-password'))
                                                            <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="new-password-confirm" class="col-md-4 control-label">Confirm New Password</label>

                                                    <div class="col-md-6">
                                                        <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required              >
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="col-md-6 col-md-offset-4">
                                                        <button type="submit" class="btn btn-primary">
                                                            Change Password
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


