<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guidbookquestion extends Model
{
    use HasFactory;

    protected $table = 'guidbookquestions';

    protected $fillable = ['questions', 'histories_id'];

    public function guidebookanswer(){

        return $this->hasOne('App\Models\Guidbookanswer', 'guidbookquestions_id');
    }

   
    
}
