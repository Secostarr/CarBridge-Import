<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class car extends Model
{
    protected $table = 'cars';
    protected $primaryKey = 'id_cars';

    protected $fillable = [
        'merek',
        'car_type',
        'type_of_car',
        'photo',
        'description',
        'engine',
        'transmission',
        'capacity',
        'feature',
        'price',
        'status',
    ];
}
