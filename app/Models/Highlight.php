<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Highlight extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'image_id',
        'url',
    ];

    public function image()
    {
        return $this->belongsTo(Asset::class, 'image_id')->where('type', 'highlight');
    }
}
