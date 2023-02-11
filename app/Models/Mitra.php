<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;

    public function mobil()
    {
        return $this->belongsTo(Mobil::class, 'id_mobil');
    }
}
