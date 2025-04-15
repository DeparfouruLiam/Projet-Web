<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Retros extends Model
{
    protected $table        = 'retros';
    protected $fillable     = ['retro_name', 'cohort_id'];
}
