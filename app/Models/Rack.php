<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rack extends Model
{
    protected $table = 'racks';
    protected $fillable = [
        'name', 'description', 'created_by', 'updated_by', 'active_status',
    ];
    public function locker()
    {
        return $this->hasMany('App\Models\Locker');
    }
}
