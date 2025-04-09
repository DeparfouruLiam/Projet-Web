<?php

namespace App\Models;

use App\Models\UserCohort;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Cohort extends Model
{
    protected $table        = 'cohorts';
    protected $fillable     = ['school_id', 'name', 'description', 'start_date', 'end_date'];

//    public function UserCohort(){
//        return $this->hasOne(UserCohort::class);
//    }

    public function getUsersCohorts(){
        return UserCohort::where('cohort_id',$this->id)->get();
        //return User::where('id',$UserCohorts->cohort_id)->get();
    }
    public function getUserCohorts(){
        foreach (UserCohort::where('cohort_id',$this->id) as $userCohort) {

        }
        return UserCohort::class->GetUsers($this->cohort_id);
    }

    // Fonction pour récupérer le nombre d'étudiants de chaque cohort
    public function getNbStud(){
        return UserCohort::where('cohort_id',$this->id)->count();
    }

    // Fonction pour récupérer l'année de début seulement
    public function getStartYear(){
        return substr($this->start_date,0,4);
    }

    // Fonction pour récupérer l'année de début seulement
    public function getEndYear(){
        return substr($this->end_date,0,4);
    }

}
