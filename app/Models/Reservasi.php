<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    protected $fillable = ['tamu_id','kamar_id','check_in','check_out','total_bayar'];

    public function tamu()
    {
        return $this->belongsTo(Tamu::class);
    }

    public function kamar()
    {
        return $this->belongsTo(Kamar::class);
    }
}
