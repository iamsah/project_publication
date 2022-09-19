<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'settings';

    protected $fillable = ['name','address','email','phone','pan_no','logo','facebook','twitter','youtube','instagram','google_map','created_by','updated_by'];

    public function createdBy(){
        return $this->belongsTo(User::class,'created_by');
    }

    public function updatedBy(){
        return $this->belongsTo(User::class,'updated_by');
    }

}
