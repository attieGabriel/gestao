<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoEconomico extends Model
{
    protected $fillable = ['nome'];

    public function bandeiras()
    {
        return $this->hasMany(Bandeira::class);
    }
}

