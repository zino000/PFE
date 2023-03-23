<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    use HasFactory;
    protected $fillable=['date_rdv','heure_rdv','nom','prenom','num_tel','ID_CONSULT'];
}
