<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Attivita extends Model
{
    use HasFactory;
    protected $fillable=['nome','descrizione','corso_id','ora','giorno','sala'];
    use HasFactory;
    public function corsi():BelongsTo
    {
        return $this->belongsTo(Corso::class,"corso_id");
    }
    public function prenotazioni():HasMany
    {
        return $this->hasMany(Prenotazioni::class);
    }

}
