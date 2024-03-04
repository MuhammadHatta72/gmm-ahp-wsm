<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\Alat;
use App\Charts\AlatChart;

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
        $kriteria = Kriteria::all();
        // $alat = Alat::all();
        $alatChart = $alatChart->build();
        return view('home', compact('user', 'kriteria', 'alatChart'));
        
    }
}
