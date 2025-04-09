<?php


namespace App\Http\Controllers;

use App\Models\UserCohort;
use App\Models\UserGroups;
use App\Models\Groups;
use App\Models\Cohort;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;


class GroupController extends Controller
{
    /**
     * Display the page
     *
     * @return Factory|View|Application|object
     */
    public function index() {
        $cohorts = Cohort::all();
        return view('pages.groups.index', compact('cohorts'));
    }

    /**
     * Display a specific cohort
     * @param Cohort $cohort
     * @return Application|Factory|object|View
     */
    public function show(Cohort $cohort) {

        return view('pages.groups.show', [
            'cohort' => $cohort
        ]);
    }

    //Fonction pour générer de groupes selon le nombre de personnes par groupe demandées
    public function generate(Request $request,Cohort $cohort) {
        $CohortUsers = UserCohort::where('cohort_id',1)->get();
        $current_user = 0;
        for ($i = 0; $i < ceil($CohortUsers->count()/$request->select); $i++) {
            $current_group = Groups::create([
                'group_name' => 'Groupe'.($i+1),
            ]);
            for ($j =0; $j < $request->select; $j++) {
                try{
                UserGroups::create([
                    'user_id' => $CohortUsers[$current_user]->user_id,
                    'group_id' => $current_group->id,
                    'cohort_id' => $cohort->id,
                ]);
                $current_user++;
                }
                catch (\Exception $exception){
                    return redirect('/groups');
                }
            }
        }
        return redirect('/groups');

    }
}
