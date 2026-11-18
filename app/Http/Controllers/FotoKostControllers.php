<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FotoKost;

class FotoKostControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fotoKost = FotoKost::all();

        return response()->json([
            'message' => 'Berhasil mengambil semua data foto kost',
            'data' => $fotoKost
        ], 200);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'idKamar' => 'nullable|integer|exists:kamars, id',
            'foto' => 'required|string',
            'keterangan' => 'required|string'
        ]);

        $create = FotoKost::create([
            'idKamar' => $request->idKamar,
            'foto' => $request->foto,
            'keterangan' => $request->keterangan
        ]);

        return response()->json([
            'message' => 'Data foto kost berhasil ditambahkan',
            'data' => $create
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        $fotoKost = FotoKost::findOrFail($id);

        return response()->json([
            'message' => 'Berhasil mengambil data foto kost',
            'data' => $fotoKost
        ], 200);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fotoKost = FotoKost::findOrFail($id);

        $request->validate([
            'idKamar' => 'nullable|sometimes|integer|exists:kamars, idKamar',
            'foto' => 'sometimes|required|string',
            'keterangan' => 'sometimes|required|string'
        ]);

        $data = $request->only([
            'idKamar',
            'foto',
            'keterangan'
        ]);
        $fotoKost->update($data);

        return response()->json([
            'message' => 'Data foto kost berhasil diubah',
            'data' => $fotoKost->fresh()
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fotoKost = FotoKost::findOrFail($id);

        $fotoKost->delete();

        return response()->json([
            'message'=> 'Data foto kost berhasil dihapus'
        ],200);
    }
}
