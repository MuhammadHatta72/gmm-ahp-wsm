<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::all();
        return view('kriteria.index', compact('kriteria'));
    }

    public function create()
    {
        return view('kriteria.create');
    }

    public function store(Request $request)
    {
        $kriteria = new Kriteria;
        $kriteria->name = $request->name;
        $kriteria->jenis = $request->jenis;
        $kriteria->save();

        session()->flash('success', 'Data berhasil disimpan!');

        return redirect()->route('Kriteria::index');
    }

    public function edit($id)
    {
        $kriteria = Kriteria::find($id);
        return view('kriteria.edit', ['kriteria' => $kriteria]);
    }

    public function update(Request $request, $id)
    {
        $kriteria = Kriteria::find($id);
        $kriteria->name = $request->name;
        $kriteria->email = $request->jenis;
        $request->session()->flash('success', 'Data berhasil diperbarui!');

        return redirect()->route('Kriteria::index');
    }

    public function destroy($id)
    {
        $kriteria = Kriteria::find($id);
        $kriteria->delete();
        session()->flash('success', 'Data berhasil dihapus!');
        return redirect()->route('Kriteria::index');
    }
}
