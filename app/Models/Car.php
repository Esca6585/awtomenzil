<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['awtoulagyn_kysymy','awtoulagyn_gornushi','awtoulogyn_shahsy_belgisi','cykan_yyly','win_kody','user_id'];
    
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
