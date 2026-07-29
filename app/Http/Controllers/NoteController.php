<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    
    public function store(Request $request)
    {
         $validated = $request->validate([
        'title' => 'required|string',
        'image' => 'required|image|mimes:jpeg,png,jpg|max:5120',
        'kategori' => 'required|string',
        'content' => 'required|string',
        'latitude' => 'nullable|numeric',
        'longitude' => 'nullable|numeric',
        ]);

        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $filename);

        $note = Note::create([
            'title'   => $request->title,
            'content' => $request->content,
            'user_id' => auth()->id(),
            'image'=> $filename, 
            'kategori' => $request->kategori,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

    return response()->json([
            'message' => 'Note berhasil disimpan!',
            'data' => $note
        ], 201);
    }


    public function index(Request $request)
    {
        $notes = $request->user()->notes()->latest()->get();
        return response()->json($notes);
    }

    public function destroy(Request $request, $id)
    {
        $note = $request->user()->notes()->find($id);

    if (!$note) {
        return response()->json(['message' => 'Catatan tidak ditemukan'], 404);
    }
    $note->delete();
    return response()->json(['message' => 'Catatan berhasil dihapus']);
    }



}
