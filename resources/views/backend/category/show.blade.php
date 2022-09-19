@extends('backend.dashboard.layouts.master')
@section('title',$title)
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">
                            {{$title}}
                            <a href="{{route($base_route.'create')}}" class="btn btn-success">
                                <i class="fas fa-plus-square"></i>
                                Add
                            </a>
                            <a href="{{route($base_route.'index')}}" class="btn btn-success">
                                <i class="fas fa-clipboard-list"></i>
                                List
                            </a>
                            <a href="{{route($base_route.'trash')}}" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                                Trash
                            </a>
                            {{-- Edit --}}
                            <a href="{{route($base_route . 'edit',[$data['row']])}}" class="btn btn-info">Edit</a>
                        </h5>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @include('backend.dashboard.includes.flash_message')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">{{$panel.' '.$title}}</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body table-responsive p-0">
                                        <table class="table table-head-fixed text-nowrap">
                                            <tr>
                                                <th>Name</th>
                                                <td>{{$data['row']->name}}</td>
                                            </tr>
                                            <tr>
                                                <th>Slug</th>
                                                <td>{{$data['row']->slug}}</td>
                                            </tr>
                                            <tr>
                                                <th>Rank</th>
                                                <td>{{$data['row']->rank}}</td>
                                            </tr>
                                            <tr>
                                                <th>Short Description</th>
                                                <td>{{$data['row']->short_description}}</td>
                                            </tr>
                                            @if(!empty($data['row']->description))
                                                <tr>
                                                    <th>Description</th>
                                                    <td>{{$data['row']->description}}</td>
                                                </tr>
                                            @endif
                                            @if(!empty($data['row']->image))
                                                <tr>
                                                    <th>Image</th>
                                                    <td><img src="{{asset('./images/' . $folder_name.'/'.$data['row']->image)}}" alt="profile Pic" style="border-radius: 50%;width: 80px;"></td>
                                                </tr>
                                            @endif
                                            @if(!empty($data['row']->mata_keyword))
                                                <tr>
                                                    <th>Meta Keyword</th>
                                                    <td>{{$data['row']->meta_keyword}}</td>
                                                </tr>
                                            @endif
                                            @if(!empty($data['row']->meta_title))
                                                <tr>
                                                    <th>Meta Keyword</th>
                                                    <td>{{$data['row']->meta_title}}</td>
                                                </tr>
                                            @endif
                                            @if(!empty($data['row']->meta_description))
                                                <tr>
                                                    <th>Meta Keyword</th>
                                                    <td>{{$data['row']->meta_description}}</td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <th>Status</th>
                                                <td>
                                                    @if($data['row']->status == 1)
                                                        <span class="text text-success">Active</span>
                                                    @else
                                                        <span class="text text-danger">De Active</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Created By</th>
                                                <td>{{$data['row']->createdBy->name}}</td>
                                            </tr>
                                            @if(!empty($data['row']->updated_by))
                                                <tr>
                                                    <th>Updated By</th>
                                                    <td>{{$data['row']->updatedBy->name}}</td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <th>Created At</th>
                                                <td>{{$data['row']->created_at}}</td>
                                            </tr>
                                            @if(!empty($data['row']->updated_at))
                                                <tr>
                                                    <th>Updated At</th>
                                                    <td>{{$data['row']->updated_at}}</td>
                                                </tr>
                                            @endif
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./card-body -->
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="javascript:history.back()" class="btn btn-default">Back</a>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!--/. container-fluid -->
@endsection
@section('js')
    @include($folder . 'includes.script')
@endsection
