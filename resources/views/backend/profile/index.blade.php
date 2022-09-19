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
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                @forelse ($data['rows'] as $index => $row)
                                    <!-- Profile Image -->
                                    <div class="card card-primary card-outline">
                                        <div class="card-body box-profile">
                                            @if(!empty($row->profile))
                                            <div class="text-center">
                                                <img class="profile-user-img img-fluid img-circle"
                                                     src="{{asset('images/profile/'.$row->profile )}}"
                                                     alt="User profile picture">
                                            </div>
                                            @endif
                                            <h3 class="profile-username text-center">{{ucfirst($row->first_name) }} @if ($row->middle_name) {{ ucfirst($row->middle_name) }} @endif {{ ucfirst($row->last_name) }}</h3>

                                            <p class="text-muted text-center"></p>

                                            <table class="table">
                                                <tr>
                                                    <th>Contact</th>
                                                    <td>{{$row->contact}}</td>
                                                </tr>
                                                @if(!empty($row->cv))
                                                    <tr>
                                                        <th>CV </th>
                                                        <td>{{$row->cv}}</td>
                                                    </tr>
                                                @endif
                                                <tr>
                                                    <th>Address</th>
                                                    <td>{{$row->address}}</td>
                                                </tr>

                                                <tr>
                                                    <th>Gender</th>
                                                    <td>
                                                        {{$row->genders->name}}</td>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Date of Birth</th>
                                                    <td>
                                                        {{$row->dob}}</td>
                                                    </td>
                                                </tr>
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
