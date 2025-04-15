<?php

namespace App\Http\Controllers;

use App\Models\Cohort;
use App\Models\Retros;
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
        return view('pages.retros.index');
    }

    public function show(Cohort $cohort) {
        $retros = Retros::all();
        return view('pages.groups.show', [
            'cohort' => $cohort, 'retros' => $retros
        ]);
    }

    public function showkanban(Cohort $cohort, Retros $retros) {
        $content = Retros::all();
        return view('pages.groups.show', [
            'cohort' => $cohort, 'retros' => $retros, 'content' => $content
        ]);
    }
}
