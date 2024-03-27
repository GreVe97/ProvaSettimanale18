<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Corso extends Model
{
    use HasFactory;
    protected $fillable =['nome','descrizione','istruttore'];
    public function attivita():HasMany
    {
        return $this->hasMany(Attivita::class);
    }
}
