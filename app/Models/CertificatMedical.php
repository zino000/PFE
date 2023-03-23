<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificatMedical extends Model
{
    use HasFactory;
    protected $fillable = ['NB_JRS_REPOS','DATE_REPOS'];
}
