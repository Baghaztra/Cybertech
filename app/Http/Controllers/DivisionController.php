<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DivisionController extends Controller
{
    public function index()
    {
        return view('admin.division.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        Event::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $request->image,
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Successfully Add Division.'
        ]);
    }

    public function show(Division $division)
    {
        return response()->json([
            'status' => 200,
            'data' => $division
        ]);
    }

    public function update(Request $request, Division $division)
    {
        $rules = [
            'name' => 'required',
            'description' => 'required|text|' . Rule::unique('divisions')->ignore($division)
        ];

        $data = [];

        if (!empty($request->image)) {
            $rules['image'] = 'min:1';
            $data['image'] = bcrypt($request->image);
        }
        $request->validate($rules);
        $data['name'] = $request->name;
        $data['description'] = $request->description;
        $division->update($data);
        return response()->json([
            'status' => 200,
            'message' => `Successfully update user $division->name.`
        ]);
    }
}
