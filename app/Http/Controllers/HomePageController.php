<?php

namespace App\Http\Controllers;


use App\Models\Fire;
use Inertia\Inertia;
use Inertia\Response;

class HomePageController extends Controller
{


    public function index(): Response {


//        This query could be placed in different service or repository in order to be complied with Single Responsibility. But not in this case:)

        $perPage = 100;
        $forests = Fire::select('NWCG_REPORTING_UNIT_NAME AS name', 'OBJECTID as id')
            ->orderby('name', 'ASC')
            ->groupBy('name')
            ->paginate($perPage);

        return Inertia::render('Home/Index', ['forests'=> $forests]);
    }
}
