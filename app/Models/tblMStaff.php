<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\tblMStaff2;

class tblMStaff extends Model
{
    // protected $fillable = [
    //     'id', 'id_subject', 'number', 'created_at', 'updated_at',
    // ];


    protected $table = 'tblMStaff';

    public function emailList() {
        return $this->hasOne(tblMStaff2::class, 'StaffID');
    }
}
