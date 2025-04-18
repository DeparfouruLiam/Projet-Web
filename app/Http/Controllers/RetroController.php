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
//        dd($this->GetRetrosJson(1));
        return view('pages.retros.showkanban', [
            'cohort' => $cohort, 'retros' => $retros, 'columns' => $columns , 'contents' => $contents
        ]);
    }

    public function GetRetrosJson(Cohort $cohort,Retros $retros)
    {
        $retros_id = $retros->id;
        $retrosFirst = Retros::All()->first();
        $formattedRetros = [
            'retro_id' => $retrosFirst->id,
            'retro_name' => $retrosFirst->retro_name,
            'columns' => $this->GetColumnsJson($retros_id)
        ];

        return response()->json($formattedRetros);
    }

    public function GetColumnsJson($retro_id)
    {
        $columns = RetrosColumns::where('retro_id', $retro_id)->get();
        $column_list = [];
        foreach ($columns as $column) {
            $column_list[] = [
                'id' => $column->id,
                'title' => $column->title,
                'items' => $this->GetContentJson($column->id)
            ];
        }
        return $column_list;
    }

    public function GetContentJson($column_id)
    {
        $contents = RetrosContent::where('column_id', $column_id)->get();
        $content_list = [];
        foreach ($contents as $content) {
            $content_list[] = [
                'id' => $content->id,
                'text' => $content->text
            ];
        }
        return $content_list;
    }

    public function AddColumnJson(){

    }
}
