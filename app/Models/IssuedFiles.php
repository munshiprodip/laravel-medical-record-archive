<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IssuedFiles extends Model
{
    protected $table = 'issued_files';
    protected $fillable = [ 'handover_to', 'place', 'issue_date', 'is_received', 'receive_date', 'file_id', 'created_by', 'updated_by', ];

    public function file()
    {
        return $this->belongsTo('App\Models\PtFiles');
    }
}
