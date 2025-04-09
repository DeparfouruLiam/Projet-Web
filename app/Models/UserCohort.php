<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserCohort extends Model
{
    protected $table        = 'users_cohorts';
    protected $fillable     = ['user_id', 'cohort_id'];

    public function GetUsers(){
        return User::where('id',$this->user_id)->first();
    }

}
