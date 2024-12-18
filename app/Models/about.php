<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class about extends Model
{
    protected $table = 'about';
    protected $primaryKey = 'id_about';

    protected $fillable = [
        'konten',
        'media_about',
    ];
}
