<?php

namespace App\Models;

use App\Models\UserCohort;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Cohort extends Model
{
    protected $table        = 'cohorts';
    protected $fillable     = ['school_id', 'name', 'description', 'start_date', 'end_date'];

    // Fonction pour récupérer la donnée dans UserCohort correspondante à l'id donnée
    public function getUsersCohorts(){
        return UserCohort::where('cohort_id',$this->id)->get();
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
