<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PtFiles extends Model
{
    protected $table = 'p_files';
    protected $fillable = [
        'hn', 'an', 'patient_name', 'ward_id', 'locker_id', 'department_id', 'tracking_no', 'doctor_id', 'speciality_id', 'created_by', 'updated_by', 'active_status', 'is_dead',
    ];

    public function ward()
    {
        return $this->belongsTo('App\Models\Wards');
    }
    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }
    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor');
    }
    public function speciality()
    {
        return $this->belongsTo('App\Models\Speciality');
    }
    public function locker()
    {
        return $this->belongsTo('App\Models\Locker');
    }
    public function author()
    {
        return $this->belongsTo('App\User', 'created_by');
    }
}
