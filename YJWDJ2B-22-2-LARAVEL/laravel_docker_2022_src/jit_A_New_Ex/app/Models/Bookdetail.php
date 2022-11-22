<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookdetail extends Model
{
    use HasFactory;
    public function book(){
        return $this->belongsTo('\App\Models\User');
        // return $this->belongsTo(\App\Models\User::class);
      } 
      protected $fillable =['name','isbn','book_id','published_date','price' ];  
}
