<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RetrosContent extends Model
{
    protected $table        = 'retros_content';
    protected $fillable     = ['text', 'user_id','column_id'];

}
