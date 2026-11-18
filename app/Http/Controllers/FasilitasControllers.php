<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fasilitas;

class FasilitasControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fasilitas = Fasilitas::all();

        return response()->json([
            'message' => 'Berhasil menampilkan semua data fasilitas',
            'data' => $fasilitas
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'idKamar' => 'nullable|integer|exists:kamars, id',
            'namaFasilitas' => 'required|string'
        ]);

        $create = Fasilitas::create([
            'idKamar' => $request->idKamar,
            'namaFasilitas' => $request->namaFasilitas
        ]);

        return response()->json([
            'message' => 'Data fasilitas berhasil ditamabahkan',
            'data' => $create
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $fasilitas = Fasilitas::findOrFail($id);

        return response()->json([
            'message' => 'Berhasil mengambil data fasilitas',
            'data' => $fasilitas
        ], 200);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fasilitas = Fasilitas::findOrFail($id);
        $request->validate([
            'idKamar' => 'sometimes|required|integer|exists:kamars,id',
            'namaFasilitas' => 'sometimes|required|string'
        ]);

        $data = $request->only([
            'idKamar',
            'namaFasilitas'
        ]);

        $fasilitas->update($data);

        return response()->json([
            'message' => 'Data fasilitas berhasil diubah',
            'data' => $fasilitas->fresh()
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fasilitas = Fasilitas::findOrFail($id);

        $fasilitas->delete();

        return response()->json([
            'message' => 'Data fasilitas berhasil dihapus'
        ], 200);
    }
}
