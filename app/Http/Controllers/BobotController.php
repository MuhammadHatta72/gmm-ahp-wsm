<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\Perbandingan;
use App\Models\Bobot;
use Illuminate\Support\Facades\DB;

class BobotController extends Controller
{
    public function index()
    {
        $bobot = Bobot::with('Kriteria', 'user')->get()->groupBy(['user_id', 'rand_token']);
        $gmm_criteria = Kriteria::all()->groupBy('name');

        return view('bobot.index', compact('bobot', 'gmm_criteria'));
    }

    public function create()
    {
        $gmm_criteria = Kriteria::all()->groupBy('name');

        return view('bobot.create', compact('gmm_criteria'));
    }

    public function store(Request $request)
    {
        $_req = $request->only('utilisasi', 'availability', 'reliability', 'jam_idle', 'jam_tersedia', 'jam_operasi', 'jumlah_bda', 'jam_bda');
        $data = array_values($_req);
        $rand_token = bin2hex(random_bytes(16));

        $status = false;

        DB::beginTransaction();

        try {
            $store = [];

            foreach ($data as $bobot) {
                foreach ($bobot as $index => $_bobot) {
                    $store[] = [
                        'id_kriteria' => $index,
                        'bobot' => $_bobot,
                        'user_id' => $request->user()->id,
                        'rand_token' => $rand_token,
                    ];
                }
            }

            Bobot::insert($store);

            $status = true;

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }

        return $status
            ? redirect()->route('Bobot::index')->with('success', 'bobot berhasil dibuat!')
            : redirect()->route('Bobot::index')->with('failed', 'bobot gagal dibuat!');
    }

    public function destroy($bobot)
    {
        $status = false;

        DB::beginTransaction();

        try {
            Bobot::where('rand_token', $bobot)->delete();
            $status = true;
        } catch (\Throwable $th) {
            DB::rollBack();
        }

        DB::commit();

        return $status
            ? redirect()->route('Bobot::index')->with('success', 'bobot berhasil dihapus!')
            : redirect()->route('Bobot::index')->with('failed', 'bobot gagal dihapus!');
    }
}
