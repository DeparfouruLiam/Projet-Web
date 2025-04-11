<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserBilan extends Model
{
    protected $table        = 'users_bilan';
    protected $fillable     = ['user_id', 'bilan_grade'];
}
