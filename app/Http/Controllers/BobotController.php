<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\Perbandingan;
use App\Models\Bobot;

class BobotController extends Controller
{
    public function index()
    {
        return view('bobot.index');
    }

    public function create()
    {
        return view('bobot.create');
    }
}
