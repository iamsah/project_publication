<div class="form-group">
    {!! Form::label('category_id', 'Category'); !!}
    {!! Form::select('category_id', $data['categories'], null,['class' => 'form-control','placeholder' => 'Select category']) !!}
    @error('category_id')
    <span class="text text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('subcategory_id', 'Subcategory'); !!}
    {!! Form::select('subcategory_id', $data['subcategories'], null,['class' => 'form-control','placeholder' => 'Select subcategory']) !!}
    @error('subcategory_id')
    <span class="text text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('isbn', 'ISBN'); !!}
    {!! Form::text('isbn',null,['class'=>'form-control']) !!}
    @error('isbn')
    <span class="text text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('title', 'title'); !!}
    {!! Form::text('title',null,['class'=>'form-control']) !!}
    @error('title')
    <span class="text text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('book_cover_file','Book Cover',['class' => 'control-label']) !!}
    {!! Form::file('book_cover_file',null,['class' => 'form-control']) !!}
    @error('book_cover_file')
    <span class="text text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('pdf_file','PDF file',['class' => 'control-label']) !!}
    {!! Form::file('pdf_file',null,['class' => 'form-control']) !!}
    @error('pdf_file')
    <span class="text text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group" >
    {!! Form::label('author_id', 'Authors'); !!}
    {!! Form::select('author_id[]', $data['authors'],null,['multiple'=>'multiple','class' => 'js-example-basic-multiple js-states form-control']) !!}
    selec
    @error('author_id')
    <span class="text text-danger">{{$message}}</span>
    @enderror
</div>
