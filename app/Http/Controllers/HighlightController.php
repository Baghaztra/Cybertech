<?php

namespace App\Http\Controllers;

use App\Models\Highlight;
use Illuminate\Http\Request;

class HighlightController extends Controller
{
    public function index()
    {
        return view("admin.highlight.index");
    }

    public function getAll()
    {
        return response()->json([
            'statusCode' => 200,
            'data' => Highlight::latest()->get()
        ]);
    }

    public function create()
    {
        return view("admin.highlight.create");
    }    
    
    public function show(Highlight $highlight)
    {
        return response()->json([
            'status' => 200,
            'data' => $highlight
        ]);
    }

    public function edit(Highlight $highlight)
    {
        return view('admin.highlight.edit', ['highlight'=>$highlight]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
            'image_id' => 'nullable',
            'url' => 'required',
        ]);

        $highlight = Highlight::create($validated);
        
        return redirect('admin/highlight')->with('status', 'Successfully added "' . $highlight->title . '".');

    }

    public function update(Request $request, Highlight $highlight)
    {
        $validated = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
            'image_id' => 'nullable',
            'url' => 'required',
        ]);

        $highlight->update($validated);

        
        return redirect('admin/highlight')->with('status', 'Successfully update "' . $highlight->title . '".');
    }

    public function destroy(Highlight $highlight)
    {
        if (!$highlight) {
            return response()->json([
                'status' => 404,
                'message' => 'Data not found.'
            ]);
        }
        $title = $highlight->title;
        $highlight->delete();
        return response()->json([
            'status' => 200,
            'message' => `Successfully delete event $title.`
        ]);
    }
}
