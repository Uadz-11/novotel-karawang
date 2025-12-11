<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tamu extends Model
{
    protected $fillable = ['nama','email','telepon','alamat'];

    public function reservasi()
    {
        return $this->hasMany(Reservasi::class);
    }
}
