<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locker extends Model
{
    protected $table = 'lockers';
    protected $fillable = [
        'name', 'capacity', 'rack_id', 'created_by', 'updated_by', 'active_status',
    ];

    public function rack()
    {
        return $this->belongsTo('App\Models\Rack');
    }
}
