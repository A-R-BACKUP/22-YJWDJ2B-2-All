<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public function bookdetail(){
        return $this->hasOne('\App\Models\Bookdetail');
        //return $this->hasOne(\App\Models\Bookdetail::class);
    }
    protected $fillable =['name','author_id','publisher_id' ];
   
}
