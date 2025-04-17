<?php

namespace App\Http\Controllers;

use App\Models\Cohort;
use App\Models\Retros;
use App\Models\RetrosColumns;
use App\Models\RetrosContent;
use Cassandra\Column;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class RetroController extends Controller
{
    /**
     * Display the page
     *
     * @return Factory|View|Application|object
     */
    public function index() {
        $cohorts = Cohort::all();
        return view('pages.retros.index' , compact('cohorts'));
    }

    public function show(Cohort $cohorts) {
        $retros = Retros::all();
        return view('pages.retros.show', [
            'cohorts' => $cohorts, 'retros' => $retros
        ]);
    }

    public function showkanban(Cohort $cohort, Retros $retros) {
        $contents = Retros::all();
        $columns = RetrosColumns::all();
        dd($this->GetRetrosJson(1));
        return view('pages.retros.showkanban', [
            'cohort' => $cohort, 'retros' => $retros, 'columns' => $columns , 'contents' => $contents
        ]);
    }

    public function GetRetrosJson($retros_id)
    {
        $retros = Retros::All();
        $formattedRetros = $retros->map(function($retro){
            $boards = $retro->columns->map(function($col){
                $items = $col->elements->map(function($elem){
                    return [
                        'id'    => $elem->id,
                        'title' => $elem->text
                    ];
                });
                return [
                    'id'    => $col->id,
                    'title' => $col->title,
                    'item'  => $items->toArray()
                ];
            });
            return [
                'retro_id'    => $retro->id,
                'cohort_name' => $retro->cohort ? $retro->cohort->name : '',
                'retro_title' => $retro->title,
                'boards'      => $boards->toArray()
            ];
        });

        return response()->json($formattedRetros);
    }
//        $formattedRetros = [
//            'retro_id' => $retros['id'],
//            'retro_name' => $retros['retro_name'],
//            'columns' => $this->GetColumnsJson($retros_id)->toArray()
//        ];
//
//        dd(response()->json($formattedRetros));
//        return response()->json($formattedRetros);
//    }

    public function GetColumnsJson($retro_id)
    {
        $columns = RetrosColumns::where('retro_id', $retro_id)->get();
        return [
            'id'    => 'column_' . $columns->id,
            'title' => $columns->title,
            'item'  => $this->GetContentJson($columns->id)->toArray()
        ];
    }

    public function GetContentJson($column_id)
    {
        $content = RetrosContent::where('column_id', $column_id)->get();
        return [
            'id'    => $content->id,
            'title' => $content->title
        ];
    }
}
