<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriteria = Criteria::all();
        return view('kriteria.index', compact('kriteria'));
    }

    public function create()
    {
        return view('kriteria.create');
    }

    public function store(Request $request)
    {
        Criteria::updateOrCreate([
            'name' => $request->name
        ], [
            'jenis' => $request->jenis
        ]);

        session()->flash('success', 'Data berhasil disimpan!');

        return redirect()->route('Kriteria::index');
    }

    public function edit($id)
    {
        $kriteria = Criteria::find($id);
        return view('kriteria.edit', ['kriteria' => $kriteria]);
    }

    public function update(Request $request, $id)
    {
        $kriteria = Criteria::find($id);
        $kriteria->name = $request->name;
        $kriteria->email = $request->jenis;
        $request->session()->flash('success', 'Data berhasil diperbarui!');

        return redirect()->route('Kriteria::index');
    }

    public function destroy($id)
    {
        $kriteria = Criteria::find($id);
        $kriteria->delete();
        session()->flash('success', 'Data berhasil dihapus!');
        return redirect()->route('Kriteria::index');
    }
}
