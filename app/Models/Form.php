<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['id', 'title', 'description', 'event_id'];
    protected static function boot()
    {
        parent::boot();

        // Otomatis generate UUID waktu bikin form baru
        static::creating(function ($model) {
            $model->id = (string) \Illuminate\Support\Str::uuid();
        });
    }

    public function questions(){
        return $this->hasMany(Question::class);
    }
 
    public function event(){
        return $this->hasOne(Event::class, 'id', 'event_id');
    }

    public function responses(){
        return $this->hasMany(Response::class);
    }
}
