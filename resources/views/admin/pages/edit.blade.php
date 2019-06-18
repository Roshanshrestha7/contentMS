@extends('admin.layout.app')

@section('content')

    <section class="content-header">
        <h1>
            General Form Elements
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-file"></i> Page</a></li>
            <li><a href="#">Index</a></li>

            <li><a href="#">Edit Page</a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Page</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    {!! Form::model($page,['method'=>'put','route'=>['page.update',$page],'enctype'=>'multipart/form-data','file'=>false]) !!}
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Page Menu</label>
                            {{--<select class="form-control" name="parent_page_id">--}}
                                {{--<option value="">Select Parent Page</option>--}}
                                {{--@foreach($pages as $item)--}}

                                    {{--@if($item->id==$page->parent_page_id)--}}

                                        {{--<option value="{{$item->id}}" selected>{{$item->title}}</option>--}}

                                    {{--@else--}}

                                        {{--<option value="{{$item->id}}">{{$item->title}}</option>--}}


                                    {{--@endif--}}

                                {{--@endforeach--}}
                            {{--</select>--}}
                            {{Form::select('parent_page_id',$pages->pluck('title','id'),Request::get('title'),['class'=>'form-control select2','id'=>'parent_page_id','placeholder'=>
                                         'Select Parent Page'])}}

                        </div>
                        <div class="form-group {{ ($errors->has('title'))?'has-error':'' }}">
                            <label for="exampleInputPassword1">Title</label>
                            {{Form::text('title',null,['class' => 'form-control'])}}
                            {{--<input type="text" class="form-control" value="{{$page->title}}" name="title" id="inputEmail3" placeholder="Title">--}}
                            {!! $errors->first('title', '<span class="text-danger">:message</span>') !!}
                        </div>
                        <div class="form-group {{ ($errors->has('description'))?'has-error':'' }}">
                            <label for="exampleInputFile">Description</label>
                            {{Form::textarea('description',null,['class' => 'form-control','placeholder' => 'place some text here'])}}
                            {!! $errors->first('description', '<span class="text-danger">:message</span>') !!}
                            {{--<textarea  name="description" placeholder="Place some text here"--}}
                                       {{--style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{$page->description}}</textarea>--}}
                        </div>
                        <div class="form-group">
                            <label for="status"> Active ?</label><br>
                            {{Form::radio('status', 'active',true,['class'=>'minimal-red'])}} Active
                            &nbsp;&nbsp;&nbsp;
                            {{Form::radio('status', 'inactive',null,['class'=>'minimal-red'])}} Inactive
                            {{--{{Form::radio('status', 'active',true,['class'=>'minimal-red'])}} Active--}}
                            {{--&nbsp;&nbsp;&nbsp;--}}
                            {{--{{Form::radio('status', 'inactive',null,['class'=>'minimal-red'])}} Inactive--}}
                        </div>
                        {{--<div class="form-group">--}}
                            {{--<label for="exampleInputFile">Action</label>&nbsp &nbsp--}}
                            {{--<input type="radio" name="status" value="active" checked >Active &nbsp &nbsp--}}
                            {{--<input type="radio" name="status" value="inactive">Inactive--}}
                        {{--</div>--}}
                        <div class="form-group {{ ($errors->has('order'))?'has-error':'' }}">
                        <label for="order">Page Order</label>&nbsp &nbsp
                            {{Form::number('order',null,['placeholder' => 'Order'])}}
                            {{--<input type="integer"  name="order" value="{{$page->order}}" placeholder="order">--}}
                            {!! $errors->first('order', '<span class="text-danger">:message</span>') !!}
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-info center-block">Update</button>
                </div>
                {{Form::close()}}
            </div>
        </div>
    </section>
@endsection