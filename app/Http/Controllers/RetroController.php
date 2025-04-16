<?php

namespace App\Http\Controllers;

use App\Models\Cohort;
use App\Models\Retros;
use App\Models\RetrosColumns;
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
        return view('pages.retros.showkanban', [
            'cohort' => $cohort, 'retros' => $retros, 'columns' => $columns , 'content' => $contents
        ]);
    }
}
