<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RetrosColumns extends Model
{
    protected $table        = 'retros_columns';
    protected $fillable     = ['title', 'retro_id'];

    public function retro()
    {
        return $this->belongsTo(Retros::class);
    }

    public function elements()
    {
        return $this->hasMany(RetrosContent::class, 'retros_column_id');
    }
}
