<?php
namespace App\DataProvider\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $fillable = [ // whitelist, mass assignment 허가
        'name',
        'address',
    ];
}
