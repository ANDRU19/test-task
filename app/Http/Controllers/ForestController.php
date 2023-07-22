<?php

namespace App\Http\Controllers;

use App\Models\Fire;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class ForestController extends Controller
{
    public function show($name): Response {

        $decodedName = urldecode($name);

        $fires = Fire::select('FPA_ID', 'FIRE_NAME', 'DISCOVERY_DATE', 'STAT_CAUSE_DESCR', 'NWCG_REPORTING_UNIT_NAME')->where('NWCG_REPORTING_UNIT_NAME', '=', $decodedName)->get();

        $forest = $fires->unique('NWCG_REPORTING_UNIT_NAME')->first();


        return Inertia::render('Forest/Show', ['fires' => $fires, 'forest' => $forest]);

    }
}
