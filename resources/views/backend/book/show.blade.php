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
                                                <td>{{$data['row']->title}}</td>
                                            </tr>
                                            <tr>
                                                <th>ISBN</th>
                                                <td>{{$data['row']->isbn}}</td>
                                            </tr>
                                            <tr>
                                                <th>Book Cover</th>
                                                <td><img src="{{asset('images/book/'.$data['row']->book_cover )}}" alt="Book Cover" width="100px" /></td>
                                            </tr>
                                            <tr>
                                                <th>Category</th>
                                                <td>{{$data['row']->category->name}}</td>
                                            </tr>
                                            <tr>
                                                <th>Subcategory</th>
                                                <td>{{$data['row']->subcategory->name}}</td>
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
                    <div class="top-bar">
                        <div class="ac">
                            <button class="btn_book" id="prev-page"><i class="fas fa-arrow-circle-left"></i></button>
                            <span class="page-info"><span id="page-num"></span> of <span id="page-count"></span></span>
                            <button class="btn_book" id="next-page"><i class="fas fa-arrow-circle-right"></i></button>
                        </div>
                    </div>
                    <div align="center">
                        <canvas id="pdf-render"></canvas>
                    </div>
{{--                    <embed src="{{ asset('files/book/'.$data['row']->pdf) }}##toolbar=0" width="100%" height="850" style="margin: 0 auto"/>--}}
{{--                    <iframe src ="{{ asset('files/book/6473_सशस्त्र प्रहरी नियमावली २०७२.pdf') }}#toolbar=0" width="100%" height="850" style="margin: 0 auto"></iframe>--}}
{{--                    <div id='viewer' style='width:1024px;height:600px;margin:0 auto'></div>--}}
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!--/. container-fluid -->

@endsection
@section('css')
    @include($folder . 'includes.style')
@endsection
@section('js')
    @include($folder . 'includes.script')

    {{--    for pdf viewing--}}
    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>

    <script>

        const url="{{ asset('files/book/'.$data['row']->pdf) }}";

        let pdfDoc = null,
            pageNum = 1,
            pageIsRendering = false,
            pageNumIsPending = null;

        const scale = 1.5,
            canvas = document.querySelector('#pdf-render'),
            ctx = canvas.getContext('2d');

        // Render the page
        const renderPage = num => {
            pageIsRendering = true;

            // Get page
            pdfDoc.getPage(num).then(page => {
                // Set scale
                const viewport = page.getViewport({ scale });
                canvas.height = viewport.height;
                canvas.width = viewport.width;

                const renderCtx = {
                    canvasContext: ctx,
                    viewport
                };

                page.render(renderCtx).promise.then(() => {
                    pageIsRendering = false;

                    if (pageNumIsPending !== null) {
                        renderPage(pageNumIsPending);
                        pageNumIsPending = null;
                    }
                });

                // Output current page
                document.querySelector('#page-num').textContent = num;
            });
        };

        // Check for pages rendering
        const queueRenderPage = num => {
            if (pageIsRendering) {
                pageNumIsPending = num;
            } else {
                renderPage(num);
            }
        };

        // Show Prev Page
        const showPrevPage = () => {
            if (pageNum <= 1) {
                return;
            }
            pageNum--;
            queueRenderPage(pageNum);
        };

        // Show Next Page
        const showNextPage = () => {
            if (pageNum >= pdfDoc.numPages) {
                return;
            }
            pageNum++;
            queueRenderPage(pageNum);
        };

        // Get Document
        pdfjsLib
            .getDocument(url)
            .promise.then(pdfDoc_ => {
            pdfDoc = pdfDoc_;

            document.querySelector('#page-count').textContent = pdfDoc.numPages;

            renderPage(pageNum);
        })
            .catch(err => {
                // Display error
                const div = document.createElement('div');
                div.className = 'error';
                div.appendChild(document.createTextNode(err.message));
                document.querySelector('body').insertBefore(div, canvas);
                // Remove top bar
                document.querySelector('.top-bar').style.display = 'none';
            });

        // Button Events
        document.querySelector('#prev-page').addEventListener('click', showPrevPage);
        document.querySelector('#next-page').addEventListener('click', showNextPage);
    </script>
    {{--for pdf viewing--}}
@endsection
