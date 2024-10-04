<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.member.index");
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
            'name' => 'required',
            'status_id' => 'required|exist:member_statuses',
        ]);

        Member::create([
            'name' => $request->name,
            'status_id' => $request->status,
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Successfully Add Member.'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        return response()->json([
            'status' => 200,
            'data' => $member
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        $request->validate([
            'name' => 'required',
            'status_id' => 'required|exist:member_statuses',
        ]);

        $member->update([
            'name' => $request->name,
            'status_id' => $request->status,
        ]);

        return response()->json([
            'status' => 200,
            'message' => `Successfully update event" $member->name."`
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        if (!$member) {
            return response()->json([
                'status' => 404,
                'message' => 'Data not found.'
            ]);
        }
        $name = $member->name;
        $member->delete();
        return response()->json([
            'status' => 200,
            'message' => `Successfully delete "$name."`
        ]);
    }
}
