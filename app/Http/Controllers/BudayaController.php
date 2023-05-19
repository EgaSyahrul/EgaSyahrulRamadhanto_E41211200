<?php

namespace App\Http\Controllers;

use App\Models\Budaya;
use Illuminate\Http\Request;

class BudayaController extends Controller
{
    public function index()
    {
        $budayas = Budaya::all();
        return view('backend.budaya.index', compact('budayas'));
    }

    public function create()
    {
        return view('backend.budaya.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        Budaya::create($request->all());

        return redirect()->route('budaya.index')
            ->with('success', 'Data Pelanggan baru telah berhasil disimpan');
    }

    public function edit($id)
    {
        $budaya = Budaya::find($id);
        return view('backend.budaya.edit', compact('budaya'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $budaya = Budaya::find($id);
        $budaya->update($request->all());

        return redirect()->route('budaya.index')
            ->with('success', 'Data Pelanggan telah berhasil diperbarui');
    }

    public function destroy($id)
    {
        $budaya = Budaya::find($id);
        $budaya->delete();

        return redirect()->route('budaya.index')
            ->with('success', 'Data Pelanggan telah berhasil dihapus');
    }
}
