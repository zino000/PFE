<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificatMedical extends Model
{
    use HasFactory;
    protected $fillable = ['nb_jrs','date','id_consult'];
}
