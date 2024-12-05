<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    public function index()
    {
        $stories = Story::with('category')->get();
        return response()->json($stories);
    }

    public function store(Request $request)
    {
        $story = Story::create($request->all());
        return response()->json($story, 201);
    }

    public function show($id)
    {
        $story = Story::with('category')->find($id);

        if (!$story) {
            return response()->json(['message' => 'Story not found'], 404);
        }

        return response()->json($story);
    }

    public function update(Request $request, $id)
    {
        $story = Story::find($id);

        if (!$story) {
            return response()->json(['message' => 'Story not found'], 404);
        }

        $story->update($request->all());
        return response()->json(['message' => 'Story updated successfully', 'data' => $story]);
    }

    public function destroy($id)
    {
        $story = Story::find($id);

        if (!$story) {
            return response()->json(['message' => 'Story not found'], 404);
        }

        $story->delete();
        return response()->json(['message' => 'Story deleted successfully']);
    }
}
