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
                                                <td>{{ucfirst($data['row']->first_name) }} @if ($data['row']->middle_name) {{ ucfirst($data['row']->middle_name) }} @endif {{ ucfirst($data['row']->last_name) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Contact</th>
                                                <td>{{$data['row']->contact}}</td>
                                            </tr>
                                            @if(!empty($data['row']->profile))
                                                <tr>
                                                    <th>Profile Picture </th>
                                                    <td><img src="{{asset('./images/' . $folder_name.'/'.$data['row']->profile)}}" alt="profile Pic" style="border-radius: 50%;width: 80px;"></td>
                                                </tr>
                                            @endif
                                            @if(!empty($data['row']->cv))
                                                <tr>
                                                    <th>CV </th>
                                                    <td>{{$data['row']->cv}} file must be downloadable, should be displayed</td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <th>Address</th>
                                                <td>{{$data['row']->address}}</td>
                                            </tr>

                                            <tr>
                                                <th>Gender</th>
                                                <td>
                                                    {{$data['row']->genders->name}}</td>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Date of Birth</th>
                                                <td>
                                                    {{$data['row']->dob}}</td>
                                                </td>
                                            </tr>
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
