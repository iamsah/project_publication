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
                                                <td>{{$data['row']->name}}</td>
                                            </tr>
                                            <tr>
                                                <th>Address</th>
                                                <td>{{$data['row']->address}}</td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td>{{$data['row']->email}}</td>
                                            </tr>
                                            <tr>
                                                <th>Phone</th>
                                                <td>{{$data['row']->phone}}</td>
                                            </tr>
                                            <tr>
                                                <th>PAN No.</th>
                                                <td>{{$data['row']->pan_no}}</td>
                                            </tr>
                                            @if(!empty($data['row']->facebook))
                                                <tr>
                                                    <th>Facebook</th>
                                                    <td>{{$data['row']->facebook}}</td>
                                                </tr>
                                            @endif
                                            @if(!empty($data['row']->twitter))
                                                <tr>
                                                    <th>Twitter </th>
                                                    <td>{{$data['row']->twitter}}</td>
                                                </tr>
                                            @endif
                                            @if(!empty($data['row']->youtube))
                                                <tr>
                                                    <th>Youtube</th>
                                                    <td>{{$data['row']->youtube}}</td>
                                                </tr>
                                            @endif
                                            @if(!empty($data['row']->instagram))
                                                <tr>
                                                    <th>Instagram</th>
                                                    <td>{{$data['row']->instagram}}</td>
                                                </tr>
                                            @endif
                                            @if(!empty($data['row']->google_map))
                                                <tr>
                                                    <th>Google Map Address</th>
                                                    <td>{{$data['row']->google_map}}</td>
                                                </tr>
                                            @endif
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
