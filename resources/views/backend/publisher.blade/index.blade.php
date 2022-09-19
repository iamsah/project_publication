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
                                    <div class="card-body table-responsive p-0" ">
                                @forelse ($data['rows'] as $index => $row)
                                    <!-- Profile Image -->
                                        <div class="card card-primary card-outline">
                                            <div class="card-body box-profile">
                                                <h3 class="profile-username">{{ucfirst($row->name) }}</h3>
                                                <table class="table">
                                                    <tr>
                                                        <th>Address</th>
                                                        <td>{{$row->address}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Contact</th>
                                                        <td>{{$row->contact}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>country</th>
                                                        <td>{{$row->country}}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Created By</th>
                                                        <td>{{$row->createdBy->name}}</td>
                                                    </tr>
                                                    @if(!empty($row->updated_by))
                                                        <tr>
                                                            <th>Updated By</th>
                                                            <td>{{$row->updatedBy->name}}</td>
                                                        </tr>
                                                    @endif
                                                    <tr>
                                                        <th>Created At</th>
                                                        <td>{{$row->created_at}}</td>
                                                    </tr>
                                                    @if(!empty($row->updated_at))
                                                        <tr>
                                                            <th>Updated At</th>
                                                            <td>{{$row->updated_at}}</td>
                                                        </tr>
                                                    @endif
                                                </table>
                                                <a href="{{route($base_route . 'edit',[$row])}}" class="btn btn-primary btn-block"><b>Edit Profile</b></a>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                        <!-- /.card -->
                                    @empty
                                        {{$panel}} not created
                                        <a href="{{route($base_route . 'create')}}" class="btn btn-info">Create</a>
                                    @endforelse
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
