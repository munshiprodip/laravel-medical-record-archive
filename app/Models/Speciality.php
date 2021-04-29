<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    protected $table = 'specialities';
    protected $fillable = [
        'name', 'created_by', 'updated_by', 'active_status',
    ];
}
