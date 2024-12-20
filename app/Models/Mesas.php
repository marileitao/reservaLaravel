<?php

namespace App\Models;

use App\Models\Reservas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mesas extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function reservas()
    {
        return $this->hasMany(Reservas::class, 'mesa_id');
    }
    

}
