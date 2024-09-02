<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'type',
        'entity_id',
    ];

    // monggo ditambahkan, sesuai apa saja yang pake gambar
    public function entity(){
        if ($this->type = 'event') {
            $table_name = 'events';
        }else if($this->type = 'post') {
            $table_name = 'posts';
        }else{
            return;
        }
        return $this->BelongsTo($table_name, 'entity_id');
    }
}
