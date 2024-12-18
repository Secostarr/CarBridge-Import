<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    protected $table = 'homes';
    protected $primaryKey = 'id_home';

    protected $fillable = [
        'nama_situs',
        'selogan',
        'media_utama',
    ];
}
