<div class="form-group">
    {!! Form::label('name', 'Name'); !!}
    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'e.g.: gender management']) !!}
    @error('name')
    <span class="text text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('route', 'Route'); !!}
    {!! Form::text('route',null,['class'=>'form-control']) !!}
    @error('route')
    <span class="text text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('status', 'Status'); !!}
    {!! Form::radio('status',1) !!} Active
    {!! Form::radio('status',0,true) !!} De Active
</div>
