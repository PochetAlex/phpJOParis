<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    use HasFactory;

    protected $casts = [
        'date_debut' => 'datetime',
        'date_fin' => 'datetime',
    ];

}
