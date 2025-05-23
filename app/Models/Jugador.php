<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jugador extends Model
{
    use HasFactory;

    protected $table = 'jugadores';

    public function equipo(): BelongsTo
    {
        return $this->belongsTo(Equipo::class);
    }
}
