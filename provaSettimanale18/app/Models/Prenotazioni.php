<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Prenotazioni extends Model
{
    use HasFactory;
   protected $fillable = ["user_id","attivita_id","stato"];
    public function attivita():BelongsTo
    {
        return $this->belongsTo(Attivita::class);
    }
    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
