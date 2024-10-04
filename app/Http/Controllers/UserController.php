<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.users.index");
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function getAll()
    {
        return response()->json([
            'statusCode' => 200,
            'data' => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'username' => 'required',
            'password' => 'required'
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => bcrypt($request->password)
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Successfully Add user.'
        ]);
    }

    /**
     * Display the specified resource.
     * 
     * keknya ini ga bakal kepake, tapi taro aja, mana tau
     */
    public function show(User $user)
    {
        return response()->json([
            'status' => 200,
            'data' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'username' => 'required',
            'email' => 'required|email|' . Rule::unique('users')->ignore($user)
        ];

        $data = [];

        if (!empty($request->password)) {
            $rules['password'] = 'min:1';
            $data['password'] = bcrypt($request->password);
        }
        $request->validate($rules);
        $data['username'] = $request->username;
        $data['email'] = $request->email;
        $user->update($data);
        return response()->json([
            'status' => 200,
            'message' => "Successfully update user $user->username."
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if (!$user) {
            return response()->json([
                'status' => 404,
                'message' => 'Data not found.'
            ]);
        }

        if (Auth::user()->id == $user->id) {
            return response()->json([
                'status' => 204,
                'message' => 'Cannot remove your account.'
            ]);
        }
        $username = $user->username;
        $user->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Successfully delete user '.$username.'.'
        ]);
    }
}
