<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subcategory extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'subcategories';

    protected $fillable = ['category_id','name','slug','rank','image','short_description','description','meta_keyword','meta_title','meta_description','status','created_by','updated_by'];

    function  category(){
        return $this->belongsTo(Category::class);
    }

    function createdBy(){
        return $this->belongsTo(User::class,'created_by');
    }

    function updatedBy(){
        return $this->belongsTo(User::class,'updated_by');
    }

    function books(){
        return $this->hasMany(Book::class);
    }
}
