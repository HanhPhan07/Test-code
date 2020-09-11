<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\tblMStaff;

class tblMStaff2 extends Model
{
    // protected $fillable = [
    //     'id', 'id_subject', 'number', 'created_at', 'updated_at',
    // ];

    protected $table = 'tblMStaff2';

    public function tblMStaff() {
        return $this->belongsTo(tblMStaff::class,'StaffID');
    }
}
