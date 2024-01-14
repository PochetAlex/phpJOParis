<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Sport extends Model
{
    use HasFactory;

    protected $casts = [
        'date_debut' => 'datetime',
        'date_fin' => 'datetime',
    ];

    public function image() {
        return Storage::url($this->url_media);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
