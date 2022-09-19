<div class="form-group">
    {!! Form::label('first_name', 'First Name'); !!}
    {!! Form::text('first_name',null,['class'=>'form-control']) !!}
    @error('first_name')
    <span class="text text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('middle_name', 'Middle Name'); !!}
    {!! Form::text('middle_name',null,['class'=>'form-control']) !!}
    @error('middle_name')
    <span class="text text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('last_name', 'Last Name'); !!}
    {!! Form::text('last_name',null,['class'=>'form-control']) !!}
    @error('last_name')
    <span class="text text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('email', 'Email'); !!}
    {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'e.g.: example@gmail.com']) !!}
    @error('email')
    <span class="text text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('contact', 'Phone No. '); !!}
    {!! Form::number('contact',null,['class'=>'form-control']) !!}
    @error('contact')
    <span class="text text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('address', 'Address'); !!}
    {!! Form::textarea('address',null,['class' => 'form-control','rows' => 3]) !!}
    @error('address')
    <span class="text text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('gender_id', 'Gender'); !!}
    {!! Form::select('gender_id', $data['genders'], null,['class' => 'form-control','placeholder' => 'Select gender']) !!}
    @error('gender_id')
    <span class="text text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('profile_file','Image',['class' => 'control-label']) !!}
    {!! Form::file('profile_file',null,['class' => 'form-control']) !!}
    @error('profile_file')
    <span class="text text-danger">{{$message}}</span>
    @enderror
    <img src="" id="profile-img-tag" width="80px" />
</div>
<div class="form-group">
    {!! Form::label('dob', 'Date Of Birth'); !!}
    {{ Form::date('dob', null,['class' => 'form-control']) }}
    @error('dob')
    <span class="text text-danger">{{$message}}</span>
    @enderror
</div>
