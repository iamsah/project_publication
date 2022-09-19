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
                            @can('create',\App\Models\Book::class)
                            <a href="{{route($base_route.'create')}}" class="btn btn-success">
                                <i class="fas fa-plus-square"></i>
                                Add
                            </a>
                            <a href="{{route($base_route.'trash')}}" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                                Trash
                            </a>
                            @endcan
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
                                        <table class="table table-head-fixed text-nowrap" id="datatable">
                                            <thead>
                                            <tr>
                                                <th>S.N.</th>
                                                <th>Name</th>
                                                <th>Authors</th>
{{--                                                <th>PDF File</th>--}}
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @forelse ($data['rows'] as $index => $row)
                                                <tr>
                                                    <td>{{$index + 1}}</td>
                                                    <td>{{ucfirst($row->title)}}</td>
                                                    <td>
                                                        @foreach($row->authors as $author)
                                                            -<span class="text text-info">{{ucfirst($author->first_name)}}</span>
                                                        @endforeach
                                                        -
                                                    </td>
{{--                                                    <td><a href="{{asset('files/book/'.$row->pdf)}}">Download book</a></td>--}}
                                                    <td>{{$row->created_at}}</td>
                                                    <td>
                                                        @can('create',\App\Models\Book::class)
                                                        {{-- Edit --}}
                                                        <a href="{{route($base_route . 'edit',[$row])}}" class="btn btn-info">Edit</a>
                                                        {{-- Delete--}}
                                                        {!! Form::open(['route' => [$base_route . 'destroy',[$row]],'method'=>'post','style'=>'display:inline-block']) !!}
                                                        {!! Form::hidden('_method','DELETE') !!}
                                                        {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                                                        {!! Form::close() !!}
                                                        {{-- Delete ends --}}
                                                        @endcan
                                                        <a href="{{route($base_route . 'show',[$row])}}" class="btn btn-info d-inline-block">View</a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text text-danger">{{$panel}} not found</td>
                                                </tr>
                                            @endforelse
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>S.N.</th>
                                                <th>Name</th>
                                                <th>Authors</th>
{{--                                                <th>PDF File</th>--}}
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                            </tfoot>
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
@section('js')
{{--<script src="//code.jquery.com/jquery-3.5.1.js"></script>--}}
{{--<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>--}}
{{--    <script>--}}
{{--        $(document).ready(function() {--}}
{{--            $('#datatable').DataTable();--}}
{{--        } );--}}
{{--    </script>--}}
@endsection

@section('css')
    /*<link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">*/
@endsection
