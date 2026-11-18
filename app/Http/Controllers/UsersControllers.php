<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;

class UsersControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Users::all();
        return response()->json([
            'message' => 'Berhasil mengambil semua data user',
            'data' => $users
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'nomorHp' => 'required|integer|max:20'
        ]);
        $create = Users::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nomorHp' => $request->nomorHp,
            'role' => 'pelanggan'
        ]);

        return response()->json([
            'message' => 'Data user berhasil dibuat',
            'data' => $create
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Users::findOrFail($id);

        return response()->json([
            'message' => "Berhasil mengambil data user",
            'data' => $user
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Users::findOrFail($id);

        $request->validate([
            'nama' => 'sometimes|required|string',
            'email' => 'sometimes|required|email|unique:users, email' . $id,
            'password' => 'sometimes|required|min:8',
            'nomorHp' => 'sometimes|required|integer|max:20',
        ]);

        $data = $request->only([
            'nama',
            'email',
            'nomorHp'
        ]);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return response()->json([
            'message'=> 'User berhasil diperbarui',
            'data'=> $user->fresh()
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        $user = Users::findOrFail($id);

        $user->delete();

        return response()->json([
            'message'=> 'user berhasil dihapus'
        ],200);
    }
}
