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
                            <a href="{{route($base_route.'trash')}}" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                                Trash
                            </a>
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
                                    <div class="card-body table-responsive p-0" >
                                        <table class="table table-head-fixed text-nowrap">
                                            <thead>
                                            <tr>
                                                <th>S.N.</th>
                                                <th>Name</th>
                                                <th>Status</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse ($data['rows'] as $index => $row)
                                                <tr>
                                                    <td>{{$index + 1}}</td>
                                                    <td>{{ucfirst($row->name)}}</td>
                                                    <td>
                                                        @if($row->status == 1)
                                                            <span class="text text-success">Active</span>
                                                        @else
                                                            <span class="text text-danger">De Active</span>
                                                        @endif
                                                    </td>
                                                    <td>{{$row->created_at}}</td>
                                                    <td>
                                                        {{-- Edit --}}
                                                        <a href="{{route($base_route . 'edit',[$row])}}" class="btn btn-info">Edit</a>
                                                        {{-- Delete--}}
                                                        {!! Form::open(['route' => [$base_route . 'destroy',[$row]],'method'=>'post','style'=>'display:inline-block']) !!}
                                                        {!! Form::hidden('_method','DELETE') !!}
                                                        {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                                                        {!! Form::close() !!}
                                                        {{-- Delete ends --}}
                                                        <a href="{{route($base_route . 'show',[$row])}}" class="btn btn-info d-inline-block">View</a>
                                                        <a href="{{route($base_route . 'assign_permission',$row->id)}}" class="btn btn-warning">Assign</a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text text-danger">{{$panel}} not found</td>
                                                </tr>
                                            @endforelse
                                            </tbody>
                                        </table>
                                        {{ $data['rows']->links() }}
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
