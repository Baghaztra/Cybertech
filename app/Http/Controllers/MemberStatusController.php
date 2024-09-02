<?php

namespace App\Http\Controllers;

use App\Models\MemberStatus;
use Illuminate\Http\Request;

class MemberStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.memberStatus.index");
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
        $request->validate([
            'title' => 'required',
        ]);

        MemberStatus::create([
            'title' => $request->title,
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Successfully Add Title.'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(MemberStatus $memberStatus)
    {
        return response()->json([
            'status' => 200,
            'data' => $memberStatus
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MemberStatus $memberStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MemberStatus $memberStatus)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $memberStatus->update([
            'title' => $request->title,
        ]);

        return response()->json([
            'status' => 200,
            'message' => `Successfully update event" $memberStatus->title."`
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MemberStatus $memberStatus)
    {
        if (!$memberStatus) {
            return response()->json([
                'status' => 404,
                'message' => 'Data not found.'
            ]);
        }
        $title = $memberStatus->title;
        $memberStatus->delete();
        return response()->json([
            'status' => 200,
            'message' => `Successfully delete "$title."`
        ]);
    }
}
