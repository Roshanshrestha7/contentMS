@extends('admin.layout.app')
@section('content')


    <section class="content">
        <div class="row">
            <div class="col-md-6">
                @if(session('info'))
                    <div class="alert alert-success">
                        {{session('info')}}
                    </div>
                @endif
                @if(session('danger'))
                    <div class="alert alert-danger">
                        {{session('danger')}}
                    </div>
                @endif
            </div>
        </div>

        <a href="{{route('test')}}" class="pull-right btn btn-success btn-sm">Create Page</a>


        <div class="card">
            <div class="card-heading">
                <h3>Created Page</h3>
            </div>
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">S.N.</th>
                        <th scope="col">name</th>
                        <th scope="col">Banner</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($pages->count() > 0)
                        @foreach($pages as $page)

                            <tr>
                                <td>
                                    {{ $no++ }}
                                </td>
                                <td>
                                    {{ $page->name }}
                                </td>
                                <td>
                                    @if($page->	banner !== NULL)
                                        <?php
                                        $arr = json_decode($page->banner);
                                        ?>
                                    @if($arr!=null)
                                        @foreach($arr as $key=> $banner)
                                               @if(file_exists('test' . $banner))
                                                   <img src="{{URL::to('storage/uploads/page/'. $banner)}}" width="50px" height="50px"/>
                                               @endif
                                                <br>
                                        @endforeach
                                        @endif
                                    @endif
                                </td>
                                <td>
                                   @if($page->status=='active')
                                       <a href="{{route('page.status',['id' => $page->id])}}" class="btn btn-sm btn-success">Active</a>
                                       @elseif($page->status == 'inactive')
                                        <a href="{{route('page.status',['id' => $page->id])}}" class="btn btn-sm btn-success">Inactive</a>
                                   @endif
                                </td>

                                <td>
                                    <a href="{{route('page.show',['id' => $page->id])}}" class="btn btn-sm btn-info">view</a>
                                    <a href="{{route('page.edit',['id' => $page->id])}}" class="btn btn-sm btn-info">edit</a>
                                    <a href="{{route('page.delete',['id' => $page->id])}}" class="btn btn-sm btn-danger">delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="5" class="text-center">No Created Page</th>
                        </tr>

                    @endif
                    </tbody>
                </table>
            </div>

        </div>

    </section>
@endsection()