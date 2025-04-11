<?php

namespace Database\Seeders;

use App\Models\Cohort;
use App\Models\School;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\UserBilan;
use App\Models\UserSchool;
use App\Models\UserCohort;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create the default user
        $admin = User::create([
            'last_name'     => 'Admin',
            'first_name'    => 'Admin',
            'email'         => 'admin@codingfactory.com',
            'password'      => Hash::make('123456'),
        ]);

        $teacher = User::create([
            'last_name'     => 'Teacher',
            'first_name'    => 'Teacher',
            'email'         => 'teacher@codingfactory.com',
            'password'      => Hash::make('123456'),
        ]);

        $user = User::create([
            'last_name'     => 'Student',
            'first_name'    => 'Student',
            'email'         => 'student@codingfactory.com',
            'password'      => Hash::make('123456'),
        ]);

        $user2 = User::create([
            'last_name'     => 'Student',
            'first_name'    => 'Salut',
            'email'         => 'salut@codingfactory.com',
            'password'      => Hash::make('123456'),
        ]);

        $user3 = User::create([
            'last_name'     => 'Student',
            'first_name'    => 'Salhuile',
            'email'         => 'salhuile@codingfactory.com',
            'password'      => Hash::make('123456'),
        ]);

        $user4 = User::create([
            'last_name'     => 'Student',
            'first_name'    => 'Salière',
            'email'         => 'saliere@codingfactory.com',
            'password'      => Hash::make('123456'),
        ]);

        $user5 = User::create([
            'last_name'     => 'Student',
            'first_name'    => 'Poivre',
            'email'         => 'poivre@codingfactory.com',
            'password'      => Hash::make('123456'),
        ]);

        $user6 = User::create([
            'last_name'     => 'Student',
            'first_name'    => 'Poiscaille',
            'email'         => 'poiscaille@codingfactory.com',
            'password'      => Hash::make('123456'),
        ]);

        $user7 = User::create([
            'last_name'     => 'Student',
            'first_name'    => 'Poilant',
            'email'         => 'poilant@codingfactory.com',
            'password'      => Hash::make('123456'),
        ]);

        $user8 = User::create([
            'last_name'     => 'Student',
            'first_name'    => 'Stupéfiant',
            'email'         => 'stupefiant@codingfactory.com',
            'password'      => Hash::make('123456'),
        ]);



        // Create the default school
        $school = School::create([
            'user_id'   => $user->id,
            'name'      => 'Coding Factory',
        ]);

        // Create the admin role
        UserSchool::create([
            'user_id'   => $admin->id,
            'school_id' => $school->id,
            'role'      => 'admin'
        ]);

        // Create the teacher role
        UserSchool::create([
            'user_id'   => $teacher->id,
            'school_id' => $school->id,
            'role'      => 'teacher'
        ]);

        // Create the student role
        UserSchool::create([
            'user_id'   => $user->id,
            'school_id' => $school->id,
            'role'      => 'student'
        ]);

        UserSchool::create([
            'user_id'   => $user2->id,
            'school_id' => $school->id,
            'role'      => 'student'
        ]);

        UserSchool::create([
            'user_id'   => $user3->id,
            'school_id' => $school->id,
            'role'      => 'student'
        ]);

        UserSchool::create([
            'user_id'   => $user4->id,
            'school_id' => $school->id,
            'role'      => 'student'
        ]);

        UserSchool::create([
            'user_id'   => $user5->id,
            'school_id' => $school->id,
            'role'      => 'student'
        ]);

        UserSchool::create([
            'user_id'   => $user6->id,
            'school_id' => $school->id,
            'role'      => 'student'
        ]);

        UserSchool::create([
            'user_id'   => $user7->id,
            'school_id' => $school->id,
            'role'      => 'student'
        ]);

        UserSchool::create([
            'user_id'   => $user8->id,
            'school_id' => $school->id,
            'role'      => 'student'
        ]);

        // Create a cohort
        $cohort = Cohort::create([
            'school_id' => $school->id,
            'name'      => 'Promotion B1',
            'description' => 'Cergy',
            'start_date' => '2024-09-01 00:00:00',
            'end_date' => '2025-05-01 00:00:00',
        ]);

        // Fill the Users_Cohorts table
        UserCohort::create([
            'user_id'   => $user->id,
            'cohort_id' => $cohort->id,
        ]);

        UserCohort::create([
            'user_id'   => $user2->id,
            'cohort_id' => $cohort->id,
        ]);

        UserCohort::create([
            'user_id'   => $user3->id,
            'cohort_id' => $cohort->id,
        ]);

        UserCohort::create([
            'user_id'   => $user4->id,
            'cohort_id' => $cohort->id,
        ]);

        UserCohort::create([
            'user_id'   => $user5->id,
            'cohort_id' => $cohort->id,
        ]);

        UserCohort::create([
            'user_id'   => $user6->id,
            'cohort_id' => $cohort->id,
        ]);

        UserCohort::create([
            'user_id'   => $user7->id,
            'cohort_id' => $cohort->id,
        ]);

        UserCohort::create([
            'user_id'   => $user8->id,
            'cohort_id' => $cohort->id,
        ]);

        UserBilan::create([
            'user_id'   => $user->id,
            'bilan_grade' => 15,
        ]);

        UserBilan::create([
            'user_id'   => $user2->id,
            'bilan_grade' => 8,
        ]);

        UserBilan::create([
            'user_id'   => $user3->id,
            'bilan_grade' => 19,
        ]);

        UserBilan::create([
            'user_id'   => $user4->id,
            'bilan_grade' => 10,
        ]);

        UserBilan::create([
            'user_id'   => $user5->id,
            'bilan_grade' => 6,
        ]);

        UserBilan::create([
            'user_id'   => $user6->id,
            'bilan_grade' => 13,
        ]);

        UserBilan::create([
            'user_id'   => $user7->id,
            'bilan_grade' => 2,
        ]);

        UserBilan::create([
            'user_id'   => $user8->id,
            'bilan_grade' => 20,
        ]);
    }
}
