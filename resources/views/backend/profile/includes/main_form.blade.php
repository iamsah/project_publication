<div class="form-group">
    {!! Form::label('first_name', 'First Name'); !!}
    {!! Form::text('first_name',null,['class'=>'form-control','placeholder'=>'e.g.: ...']) !!}
    @error('first_name')
    <span class="text text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('middle_name', 'Middle Name'); !!}
    {!! Form::text('middle_name',null,['class'=>'form-control','placeholder'=>'e.g.: .....']) !!}
    @error('middle_name')
    <span class="text text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('last_name', 'Last Name'); !!}
    {!! Form::text('last_name',null,['class'=>'form-control','placeholder'=>'e.g.: .....']) !!}
    @error('last_name')
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
    {!! Form::label('profile_file','Image',['class' => 'control-label']) !!}
    {!! Form::file('profile_file',null,['class' => 'form-control']) !!}
    @error('profile_file')
    <span class="text text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('cv_file','CV file',['class' => 'control-label']) !!}
    {!! Form::file('cv_file',null,['class' => 'form-control']) !!}
    @error('cv_file')
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
    {!! Form::label('gender_id', 'Gender'); !!}
    {!! Form::select('gender_id', $data['genders'], null,['class' => 'form-control','placeholder' => 'Select gender']) !!}
    @error('gender_id')
    <span class="text text-danger">{{$message}}</span>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('dob', 'Date Of Birth'); !!}
    {{ Form::date('dob', null,['class' => 'form-control']) }}
    @error('dob')
    <span class="text text-danger">{{$message}}</span>
    @enderror
</div>
