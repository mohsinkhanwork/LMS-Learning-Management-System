<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class colortext extends Model
{
    use HasFactory;


    protected $fillable = ['text', 'color','user_id','simpletext'];

}
