<div class="form-group">
    {!! Form::label('name', 'Name'); !!}
    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'e.g.: .....']) !!}
    @error('name')
    <span class="text text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('contact', 'Contact No. :'); !!}
    {!! Form::text('contact',null,['class'=>'form-control','placeholder'=>'e.g.: .....']) !!}
    @error('contact')
    <span class="text text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('address', 'Address'); !!}
    {!! Form::text('address',null,['class' => 'form-control','rows' => 3,'placeholder' => 'Address here...']) !!}
    @error('address')
    <span class="text text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('country', 'Country'); !!}
    {!! Form::text('country',null,['class'=>'form-control','placeholder'=>'e.g.: .....']) !!}
    @error('country')
    <span class="text text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('status', 'Status'); !!}
    {!! Form::radio('status',1) !!} Active
    {!! Form::radio('status',0,true) !!} De Active
</div>
