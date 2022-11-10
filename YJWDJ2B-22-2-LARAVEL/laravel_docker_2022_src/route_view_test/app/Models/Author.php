<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    /* protected $table = 't_author';  
    protected $pirmaryKey = 'author_id';
    protected $timestamps = false;

    protected $guarded =[
        'id',       // 대량할당 불가능
        'created_at',
        'updated_at',
    ];
 */
protected $fillable = [
    'name',  // name 필드: 대량할당 가능
]; 
    
    use HasFactory;
    use SoftDeletes;

    public function getNameAttribute(string $val):string{
        return mb_convert_case($val, MB_CASE_TITLE,"UTF-8");
    }

    public function setNameAttribute(string $val):void{
        $this->attributes['name'] = mb_convert_case($val, MB_CASE_UPPER,"UTF-8");
    }
}
