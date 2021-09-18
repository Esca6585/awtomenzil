<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Driver;
use App\Models\Car;

class Autocolumn extends Model
{
    use HasFactory;

    protected $fillable = ['driver_id', 'car_id', 'autocolumn_id'];

    public function driver(){
        return $this->belongsTo(Driver::class, 'driver_id');
    }

    public function car(){
        return $this->belongsTo(Car::class, 'car_id');
    }
}
