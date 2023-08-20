<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveRequest extends Model
{
    use HasFactory;
    protected $fillable = ['employee_id', 'leave_type_id', 'start_date', 'duration_days' ,'status'];
  

    //  relationship between LeaveRequest and Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    //  relationship between LeaveRequest and LeaveType
    public function leaveType()
    {
        return $this->belongsTo(LeaveType::class);
    }
}
