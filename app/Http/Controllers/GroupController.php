<?php


namespace App\Http\Controllers;

use App\Models\UserCohort;
use App\Models\UserGroups;
use App\Models\UserBilan;
use App\Models\Groups;
use App\Models\Cohort;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PHPUnit\Framework\Constraint\Count;
use App\Policies\GroupPolicy;


class GroupController extends Controller
{
    use AuthorizesRequests;

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
//        $this->authorize('group_gen', Groups::class);
        $groups = Groups::all();
        return view('pages.groups.show', [
            'cohort' => $cohort, 'groups' => $groups
        ]);
    }

    //Fonction pour générer de groupes selon le nombre de personnes par groupe demandées
    public function generate(Request $request,Cohort $cohort) {
        UserGroups::where('cohort_id',$cohort->id)->delete();
        Groups::where('cohort_id',$cohort->id)->delete();
        $CohortUsers = UserCohort::where('cohort_id',1)->get();

        $Users_grades = "";
        foreach ($CohortUsers as $CohortUser) {
            $Users_grades .= $CohortUser->user_id." - ".UserBilan::where('user_id',$CohortUser->user_id)->first()->bilan_grade.", ";
        }

        $prompt = "Voici une liste d'élèves avec leurs noms et leurs notes. Organise-les aléatoirement, en évitant de mettre les meilleurs ensemble et les pires ensemble, en groupes de ".$request->select." . Retourne une liste de liste nommée groupes, contenant des listes avec les id des membres du groupe, dans un format Json, sans retours à la ligne (Exemple : {groupes:[[1,2],[3,4]}). Ne renvoie rien d'autre, pas d'explications.
        Id des élèves et note : ".$Users_grades;

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post('https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=' . config('services.gemini.api_key'), [
            'contents' => [
                [
                    //add prompt in the request
                    'parts' => [
                        ['text' => $prompt]
                    ]
                ]
            ]
        ]);

        if ($response->failed()) {
            \Log::error('Gemini API error', ['response' => $response->body()]);
            dd("&&");
            return response()->json(['message' => 'Erreur avec l\'API Gemini'], 500);
        }



        $data = $response->json();
        $texte = $data['candidates'][0]['content']['parts'][0]['text'] ?? 'Aucune réponse trouvée';
        $string_groupes = substr($texte, 8, strlen($texte)-12);
        $json_groupes = json_decode($string_groupes,true);

        for ($i = 0; $i < count($json_groupes['groupes']); $i++) {
            $current_group = Groups::create([
                'group_name' => 'Groupe'.($i+1),
                'cohort_id' => $cohort->id,
            ]);
            for ($j =0; $j < count($json_groupes['groupes'][$i]); $j++) {
                try{
                UserGroups::create([
                    'user_id' => $json_groupes['groupes'][$i][$j],
                    'group_id' => $current_group->id,
                    'cohort_id' => $cohort->id,
                ]);
                }
                catch (\Exception $exception){
                    return redirect('/groups/'.$cohort->id);
                }
            }
        }
        return redirect('/groups/'.$cohort->id);

    }
}
