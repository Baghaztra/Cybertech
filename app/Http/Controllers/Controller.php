<?php

namespace App\Http\Controllers;

abstract class Controller
{
    // contoh pemanggilah fungsi: getAllData(User::class);
    public function getAllData($model)
    {
        $data = $model::latest()->get();
        return response()->json([
            'status' => 200,
            'data' => $data
        ]);
    }
}
