<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'authors';

    protected $fillable = ['first_name','middle_name','last_name','email','contact','address','gender_id','profile','dob','created_by','updated_by'];

    function  createdBy(){
        return $this->belongsTo(User::class,'created_by');
    }

    function  updatedBy(){
        return $this->belongsTo(User::class,'updated_by');
    }

    function genders(){
        return $this->belongsTo(Gender::class,'gender_id');
    }
}
