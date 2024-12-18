<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $table = 'testimonial';
    protected $primaryKey = 'id_testimonial';

    protected $fillable = [
        'label',
        'konten',
    ];
}
