<?php

namespace App\Models;
use App\Models\User;
use App\Models\UserGroups;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    protected $table = 'groups';
    protected $fillable = ['group_name', 'cohort_id'];

    public function getUsersGroups()
    {
        return UserGroups::where('group_id',$this->id)->get();
//         User::where('id',$truc->user_id)->get();
    }

}
