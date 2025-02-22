<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller {
    public function index() {
        return response()->json(Game::all(), 200);
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'release_date' => 'required|date',
            'genre' => 'required|string'
        ]);

        $game = Game::create([
            'title' => $request->title,
            'description' => $request->description,
            'release_date' => $request->release_date,
            'genre' => $request->genre,
            'user_id' => Auth::id()
        ]);

        return response()->json(['message' => 'Game added successfully', 'game' => $game], 201);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'sometimes|string',
            'description' => 'sometimes|string',
            'release_date' => 'sometimes|date',
            'genre' => 'sometimes|string'
        ]);

        $game = Game::findOrFail($id);
        $game->update($request->all());

        return response()->json(['message' => 'Game updated successfully'], 200);
    }

    public function destroy($id) {
        $game = Game::findOrFail($id);
        
        if (Auth::user()->role !== 'admin') {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
        
        $game->delete();

        return response()->json(['message' => 'Game deleted successfully'], 200);
    }
}