<?php

namespace App\Http\Controllers;

use App\Models\Budaya;
use Illuminate\Http\Request;

class apiBudayaController extends Controller
{
    public function index()
    {
        $budayas = Budaya::all();
        return response()->json(['budayas' => $budayas]);
    }

    public function create()
    {
        // Kode untuk menampilkan form create
    }

    public function store(Request $request)
    {
        

        $budaya = Budaya::create($request->all());

        return response()->json(['message' => 'Data Budaya baru telah berhasil disimpan', 'budaya' => $budaya]);
    }

    public function edit($id)
    {
        // Kode untuk menampilkan form edit
    }

    public function update(Request $request, $id)
    {
        

        $budaya = Budaya::find($id);
        $budaya->update($request->all());

        return response()->json(['message' => 'Data Budaya telah berhasil diperbarui', 'budaya' => $budaya]);
    }

    public function destroy($id)
    {
        $budaya = Budaya::find($id);
        $budaya->delete();

        return response()->json(['message' => 'Data Budaya telah berhasil dihapus']);
    }
}
