<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profiles';

    protected $fillable = ['user_id','first_name','middle_name','last_name','contact','address','gender_id','profile','cv','dob','created_by','updated_by'];

    function genders(){
        return $this->belongsTo(Gender::class,'gender_id');
    }
}
