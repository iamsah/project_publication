<div class="form-group">
    {!! Form::label('name', 'Name of Organization'); !!}
    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'e.g.: ']) !!}
    @error('name')
    <span class="text text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('address', 'Address'); !!}
    {!! Form::text('address',null,['class'=>'form-control','placeholder'=>'e.g.: Address']) !!}
    @error('address')
    <span class="text text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('email', 'Email'); !!}
    {!! Form::text('email',null,['class'=>'form-control','placeholder'=>'e.g.: example@google.com']) !!}
    @error('email')
    <span class="text text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('phone', 'Phone'); !!}
    {!! Form::number('phone',null,['class'=>'form-control','placeholder'=>'e.g.: +977 9800000000']) !!}
    @error('phone')
    <span class="text text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('pan_no', 'PAN No.'); !!}
    {!! Form::text('pan_no',null,['class'=>'form-control']) !!}
    @error('pan_no')
    <span class="text text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('logo_file','Logo',['class' => 'control-label']) !!}
    {!! Form::file('logo_file',null,['class' => 'form-control']) !!}
    @error('logo_file')
    <span class="text text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('facebook', 'Facebook'); !!}
    {!! Form::text('facebook',null,['class'=>'form-control']) !!}
    @error('facebook')
    <span class="text text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('twitter', 'Twitter'); !!}
    {!! Form::text('twitter',null,['class'=>'form-control']) !!}
    @error('twitter')
    <span class="text text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('youtube', 'Youtube'); !!}
    {!! Form::text('youtube',null,['class'=>'form-control']) !!}
    @error('youtube')
    <span class="text text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('instagram', 'Instagram'); !!}
    {!! Form::text('instagram',null,['class'=>'form-control']) !!}
    @error('instagram')
    <span class="text text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('google_map','Google Map Address',['class' => 'control-label']) !!}
    {!! Form::textarea('google_map',null,['class' => 'form-control','rows' => 3]) !!}
    @error('google_map')
    <span class="text text-danger">{{$message}}</span>
    @enderror
</div>
