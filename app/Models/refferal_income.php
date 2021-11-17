<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\User;
class refferal_income extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','refferal_income','newuser_id','paidstatus'];
    public function scopeGetuser($query){
        $query->where('user_id',auth()->user()->id);
    }
    public function scopeUserIncome($query,$id){
        $query->where('user_id',$id);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function RefUser(){
        return $this->belongsTo(User::class,'newuser_id','id');
    }
}