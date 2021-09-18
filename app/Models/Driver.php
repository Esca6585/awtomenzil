<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    
    protected $fillable = ['ady','familiyasy','atasynyn_ady','tabel_belgisi','doglan_guni','doglan_yeri','bilimi','pasport_belgisi','pasport_alynan_yeri','pasport_alynan_wagty','telefon_belgisi','yashayan_salgysy','suraty','user_id'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
