<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\lifehub;
use Illuminate\Http\Request;

class LifehubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(data: lifehub::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'deskripsi' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        $lifehub = lifehub::create($request->all());
        return response()->json([
            'message' => 'Lifehub created successfully',
            'lifehub' => $lifehub,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
         $lifehub = lifehub::find($id);

        if (!$lifehub) {
            return response()->json(['message' => 'lifehub not found'], 404);
        }

        return response()->json([
            'data' => $lifehub
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $lifehub = lifehub::find($id);

        if (!$lifehub) {
            return response()->json(['message' => 'Todo not found'], 404);
        }

        $request->validate([
            'deskripsi' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'tanggal' => 'required|date',
        ]);

        $lifehub->update($request->all());
        return response()->json([
            'message' => 'Todo updated successfully',
            'todo' => $lifehub
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $lifehub = lifehub::find($id);

        if (!$lifehub) {
            return response()->json(['message' => 'Todo not found'], 404);
        }

        $lifehub->delete();
        return response()->json([
            'message' => 'Todo deleted successfully'
        ], 200);
    }
}
