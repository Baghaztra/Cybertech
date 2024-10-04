<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false; // Karena kita pakai UUID, incrementnya kita matikan
    protected $fillable = ['id', 'title', 'description'];
    protected static function boot()
    {
        parent::boot();

        // Otomatis generate UUID waktu bikin form baru
        static::creating(function ($model) {
            $model->id = (string) \Illuminate\Support\Str::uuid();
        });
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
