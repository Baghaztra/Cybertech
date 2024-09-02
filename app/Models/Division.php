<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
    ];

    function media()
    {
        return $this->hasMany(Asset::class, 'entity_id')->where('type', 'division');
    }

    public function getAll()
    {
        return response()->json([
            'statusCode' => 200,
            'data' => Division::all()
        ]);
    }
}
