<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wards extends Model
{
    protected $table = 'wards';
    protected $fillable = [
        'name', 'created_by', 'updated_by', 'active_status',
    ];
}
