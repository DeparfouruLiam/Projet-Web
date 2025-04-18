<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserGroups extends Model
{
    protected $table        = 'users_groups';
    protected $fillable     = ['user_id', 'group_id','cohort_id'];

    public function getUsers()
    {
        return User::where('id',$this->user_id)->first();
    }
}
