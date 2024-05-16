<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Alat;
use App\Charts\AlatChart;
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
    public function index(AlatChart $alatChart)
    {
        $user = Auth::user();
        $kriteria = Criteria::all();
        // $alat = Alat::all();
        $alatChart = $alatChart->build();
        $alatData = json_decode($alatChart->dataset());

        return view('home', compact('user', 'kriteria', 'alatChart', 'alatData'));
    }
}
