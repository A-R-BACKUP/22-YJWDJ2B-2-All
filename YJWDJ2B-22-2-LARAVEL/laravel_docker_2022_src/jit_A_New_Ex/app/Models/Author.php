<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{   
    use HasFactory; // trait
    use SoftDeletes;
    //protected $table = 't_author';
    protected $fillable =[
        'name',
    ];
    public function getNameAttribute(string $val): string{  // Accessor
        return mb_convert_case($val, MB_CASE_TITLE,"UTF-8");
    }
    public function setNameAttribute(string $val): void{  // Mutator
        $this->attributes['name'] = mb_convert_case($val, MB_CASE_UPPER,"UTF-8");
    }

}
