<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = 'items';

    protected $fillable = [
        'name',
        'item_no',
        'machine_type_id',
        'department_id',
        'site_id',
        'setup_time',
        'output_per_hours',
        'status',
        'is_deleted',
        'created_by',
        'deleted_by',
    ];


    public function machineType() {
        //return $this->belongsTo(Machinetype::class);
        return $this->hasOne(Machinetype::class, 'id','machine_type_id');
    }

    public function departmentType() {
        return $this->hasOne(Productiondepartment::class, 'id','department_id');
    }

    public function siteType() {
        return $this->hasOne(Site::class, 'id','site_id');
    }
}
