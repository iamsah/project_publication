<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'permissions';

    protected $fillable = ['module_id','name','route','status','created_by','updated_by'];

    public function createdBy(){
        return $this->belongsTo(User::class,'created_by');
    }

    public function updatedBy(){
        return $this->belongsTo(User::class,'updated_by');
    }
    public function module(){
        return $this->belongsTo(Module::class);
    }

    public function  roles(){
        return $this->belongsToMany(Role::class);
    }
}
