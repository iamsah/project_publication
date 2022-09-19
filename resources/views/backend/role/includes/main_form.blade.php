<div class="form-group">
    {!! Form::label('name', 'Name'); !!}
    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'e.g.: editor']) !!}
    @error('name')
    <span class="text text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('key', 'Key'); !!}
    {!! Form::number('key',null,['class'=>'form-control','placeholder'=>'e.g.: 5','min'=>'1','max'=>'99']) !!}
    @error('key')
    <span class="text text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('status', 'Status'); !!}
    {!! Form::radio('status',1) !!} Active
    {!! Form::radio('status',0,true) !!} De Active
</div>