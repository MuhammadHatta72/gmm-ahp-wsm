<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Alat;
use App\Charts\AlatChart;
use App\Charts\AverageAlat;
use App\Models\Criteria;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(AlatChart $alatChart, AverageAlat $chart)
    {
        $user = Auth::user();
        $kriteria = Criteria::all();
        $alatChart = $alatChart->build();

        $utilisasiChart = $chart->buildUtilisasi();
        $availabilityChart = $chart->buildAvailability();
        $reliabilityChart = $chart->buildReliability();
        $idleChart = $chart->buildIdle();

        $averageUtilisasi = Alat::avg('utilisasi');
        $averageAvailability = Alat::avg('availability');
        $averageReliability = Alat::avg('reliability');
        $averageIdle = Alat::avg('idle');

        return view('home', compact('user', 'kriteria', 'alatChart', 'utilisasiChart', 'availabilityChart', 'reliabilityChart', 'idleChart', 'averageUtilisasi', 'averageAvailability', 'averageReliability', 'averageIdle'));
    }
}
