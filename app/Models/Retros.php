<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Retros extends Model
{
    protected $table        = 'retros';
    protected $fillable     = ['retro_name', 'cohort_id'];

    public function cohort()
    {
        return $this->belongsTo(Cohort::class);
    }

    public function columns()
    {
        return $this->hasMany(RetrosColumns::class);
    }

    public function elements()
    {
        return $this->hasMany(RetrosContent::class);
    }
}
