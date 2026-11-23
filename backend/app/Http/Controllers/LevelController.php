<?php

namespace App\Http\Controllers;

use App\Models\level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return response()->json([
            'success' => true,
            'message' => 'List Data Levels',
            'data'    => Level::with('events')->latest()->paginate(15),
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $data = $request->validate([
            'name' => 'required|string|max:255|unique:levels,name',
        ]);

        $level = Level::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Level berhasil dibuat',
            'data'    => $level,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
         return response()->json([
            'success' => true,
            'data'    => Level::with('events')->findOrFail($id),
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(level $level)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         $level = Level::findOrFail($id);

        $data = $request->validate([
            'name' => 'required|string|max:255|unique:levels,name,' . $id,
        ]);

        $level->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Level berhasil diupdate',
            'data'    => $level,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         Level::findOrFail($id)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Level berhasil dihapus',
        ], 200);
    }
}
