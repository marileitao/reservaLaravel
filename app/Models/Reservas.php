<?php

namespace App\Models;

use App\Models\Mesas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservas extends Model
{
    use HasFactory;
    protected $fillable = ['nome_reserva', 'quantidade_pessoas', 'data_hora_reserva', 'mesa_id', 'user_id'];

    public function mesa()
    {
        return $this->belongsTo(Mesas::class, 'mesa_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected static function booted()
    {
        self::addGlobalScope('ordered', function (Builder $queryBuilder){
            $queryBuilder->orderBy('nome_reserva');
        });
    }
}
