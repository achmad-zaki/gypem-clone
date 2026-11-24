<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class EventController extends Controller
{
    
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return response()->json([
            'success' => true,
            'message' => 'List Data Events',
            'data' => Event::with('category' , 'levels')->latest()->paginate(15),
        ], 200);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
        'category_id' => 'required|exists:categories,id',
        'name'        => 'required|string|max:255',
        'deskripsi'   => 'required|string',
        'start_date'  => 'required|date',
        'end_date'    => 'required|date|after_or_equal:start_date',
        'poster'      => 'nullable|string',
        'slug'        => 'required|string|unique:events,slug',
        'price'       => 'required|integer|min:0',
        'levels'      => 'required|array|min:1',
        'levels.*'    => 'exists:levels,id',
    ]);

  $event = Event::create([
        'category_id' => $data['category_id'],
        'name'        => $data['name'],
        'deskripsi'   => $data['deskripsi'],
        'start_date'  => $data['start_date'],
        'end_date'    => $data['end_date'],
        'poster'      => $data['poster'] ?? null,
        'slug'        => $data['slug'],
        'price'       => $data['price'],
    ]);;

    $event->levels()->sync($data['levels']);

    return response()->json([
        'success' => true,
        'message' => 'Event berhasil dibuat',
        'data'    => $event->load(['category', 'levels']),
    ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::with(['category', 'levels'])->find($id);

        if (!$event) {
            return response()->json([
                'success' => false,
                'message' => 'Event tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail Data Event',
            'data' => $event,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $event = Event::find($id);

    if (! $event) {
        return response()->json([
            'success' => false,
            'message' => "Event dengan id {$id} tidak ditemukan",
        ], 404);
    }

    $data = $request->validate([
        'category_id' => 'required|exists:categories,id',
        'name'        => 'required|string|max:255',
        'deskripsi'   => 'required|string',
        'start_date'  => 'required|date',
        'end_date'    => 'required|date|after_or_equal:start_date',
        'poster'      => 'nullable|string',
        'slug'        => 'required|string|unique:events,slug,' . $id,
        'price'       => 'required|integer|min:0',
        'levels'      => 'required|array|min:1',
        'levels.*'    => 'exists:levels,id',
    ]);

    $event->update([
        'category_id' => $data['category_id'],
        'name'        => $data['name'],
        'deskripsi'   => $data['deskripsi'],
        'start_date'  => $data['start_date'],
        'end_date'    => $data['end_date'],
        'poster'      => $data['poster'] ?? null,
        'slug'        => $data['slug'],
        'price'       => $data['price'],
    ]);

    $event->levels()->sync($data['levels']);

    return response()->json([
        'success' => true,
        'message' => 'Event berhasil diupdate',
        'data'    => $event->load(['category', 'levels']),
    ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::find($id);

        if (!$event) {
            return response()->json([
                'success' => false,
                'message' => 'Event tidak ditemukan',
            ], 404);
        }

        $event->delete();

        return response()->json([
            'success' => true,
            'message' => 'Event berhasil dihapus',
        ], 200);
    }

    private function eventRules(bool $partial = false): array
    {
        $required = $partial ? 'sometimes' : 'required';

        return [
            'name' => [$required, 'string', 'max:255'],
            'deskripsi' => [$required, 'string', 'max:255'],
            'category' => [$required, 'in:daring,luring'],
            'level' => [$required, 'in:sd,smp,sma'],
            'start_date' => [$required, 'date_format:Y-m-d'],
            'end_date' => $partial
                ? ['sometimes', 'date_format:Y-m-d']
                : ['required', 'date_format:Y-m-d', 'after_or_equal:start_date'],
            'poster' => [$required, 'string', 'max:255'],
            'slug' => [$required, 'string', 'max:255'],
            'price' => [$required, 'integer', 'min:0'],
        ];
    }
}
