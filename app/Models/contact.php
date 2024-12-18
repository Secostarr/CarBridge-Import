<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    protected $table = 'contact';
    protected $primaryKey = 'id_contact';

    protected $fillable = [
        'lokasi',
        'email',
        'phone_number',
        'url_github',
        'url_instagram',
    ];
}
