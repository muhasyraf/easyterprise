<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public $table = "employees";

    protected $fillable = [
        'name', 'uuid',
        'email','phone',
        'department_id','designation_id',
    ];

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function designation(){
        return $this->belongsTo(Designation::class);
    }

    public function employeeAttendance(){
        return $this->hasMany(EmployeeAttendance::class);
    }
}
