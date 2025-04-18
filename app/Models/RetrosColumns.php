<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RetrosColumns extends Model
{
    protected $table        = 'retros_columns';
    protected $fillable     = ['title', 'retro_id'];

}
