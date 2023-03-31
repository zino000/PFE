<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RendezVous extends Model
{
    use HasFactory;
    protected $fillable=['date_rdv','temp_dep','temp_fin','nom','prenom','genre','num_tel','date_naissance','id_ser'];
}
