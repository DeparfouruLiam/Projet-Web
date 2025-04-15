<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RetrosContent extends Model
{
    protected $table        = 'retros_content';
    protected $fillable     = ['title', 'user_id','retro_id'];
}
