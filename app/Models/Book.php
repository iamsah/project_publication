<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'books';

    protected $fillable = ['isbn','title','pdf','created_by','updated_by','category_id','subcategory_id','book_cover'];

    function  createdBy(){
        return $this->belongsTo(User::class,'created_by');
    }

    function  updatedBy(){
        return $this->belongsTo(User::class,'updated_by');
    }


    function authors(){
        return $this->belongsToMany(Author::class);
    }

    function  category(){
        return $this->belongsTo(Category::class);
    }

    function  subcategory(){
        return $this->belongsTo(Subcategory::class);
    }

}
