<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
             return response()->json([
            'success' => true,
            'message' => 'List Data Categories',
            'data' => Category::all(),
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'name' => 'required|string|max:255'
      
    ]);

    $student = Category::create($validated);

    return response()->json([
        'message' => 'Data berhasil ditambahkan',
        'data' => $student
    ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Category::find($id);

        if (!$event) {
            return response()->json([
                'success' => false,
                'message' => 'Kategori tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail Data kategori',
            'data' => $event,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $category = Category::find($id);
    if (!$category) {
            return response()->json([
                'success' => false,
                'message' => 'Event tidak ditemukan',
            ], 404);
        }

    $validated = $request->validate([
        'name' => 'required|string|max:255'
        
    ]);

    $category->update($validated);

    return response()->json([
        'message' => 'Category berhasil diupdate',
        'data' => $category
    ], 200);
}

    /**
     * Remove the specified resource from storage.
     */
        public function destroy(string $id)
    {
        $event = Category::find($id);

        if (!$event) {
            return response()->json([
                'success' => false,
                'message' => 'kategori tidak ditemukan',
            ], 404);
        }

        $event->delete();

        return response()->json([
            'success' => true,
            'message' => 'kategori berhasil dihapus',
        ], 200);
    }
}
