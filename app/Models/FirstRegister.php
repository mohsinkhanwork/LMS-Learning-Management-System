<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\User;

class FirstRegister extends Model
{
    use HasFactory;

    protected $table = 'first_registers';

    protected $fillable = ['firstregister', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
