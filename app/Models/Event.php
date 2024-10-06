<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'registration_url',
        'event_date',
    ];

    function images(){
        return $this->hasMany(Asset::class, 'entity_id')->where('type', 'event');
    }
    function jumbotron(){
        return $this->hasOne(Asset::class, 'entity_id')->where('type', 'event')->where('status', 'jumbotron');
    }
    function poster(){
        return $this->hasOne(Asset::class, 'entity_id')->where('type', 'event')->where('status', 'poster');
    }
    function defaultImg(){
        return $this->hasMany(Asset::class, 'entity_id')->where('type', 'event')->where('status', 'default');
    }
}
