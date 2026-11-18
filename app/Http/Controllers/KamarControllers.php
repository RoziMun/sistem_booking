<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;

class KamarControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kamar = Kamar::all();

        return response()->json([
            'message' => 'Berhasil menampilkan semua data kamar',
            'data' => $kamar
        ], 200);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'namaNomorKamar' => 'required|string',
            'luasKamar' => 'required|integer',
            'hargaBulanan' => 'required|integer',
            'idFasilitas' => 'required|integer|exists:fasilitas,id',
            'status' => 'required|integer|in:tersedia,penuh',
        ]);

        $create = Kamar::create([
            'namaNomorKamar' => $request->namaNomorKamar,
            'luasKamar' => $request->luasKamar,
            'hargaBulanan' => $request->hargaBulanan,
            'idFasilitas' => $request->idFasilitas,
            'status' => $request->status,
        ]);

        return response()->json([
            'message' => 'Data kamar berhasil ditambahkan',
            'data' => $create
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kamar = Kamar::findOrFail($id);

        return response()->json([
            'message' => 'Berhasil mengambil data kamar',
            'data' => $kamar
        ], 200);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kamar = Kamar::findOrFail($id);

        $request->validate([
            'namaNomorKamar' => 'sometimes|required|string',
            'luasKamar' => 'sometimes|required|integer',
            'hargaBulanan' => 'sometimes|required|integer',
            'idFasilitas' => 'sometimes|required|integer|exists:fasilitas,id',
            'status' => 'sometimes|required|in:tersedia,penuh',
        ]);

        $data= $request->only([
            'namaNomorKamar',
            'luasKamar',
            'hargaBulanan',
            'idFasilitas',
            'status'
        ]);
        $kamar->update($data);

        return response()->json([
            'message' => 'Data kamar berhasil diubah',
            'data' => $kamar->fresh()
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kamar = Kamar::findOrFail($id);

        $kamar->delete();

        return response()->json([
            'message' => 'Data kamar berhasil dihapus'
        ],200);
    }
}
