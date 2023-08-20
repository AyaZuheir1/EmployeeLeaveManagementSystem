<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'department'];

    //  relationship between Employee and User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //  relationship between Employee and LeaveRequest
    public function leaveRequests()
    {
        return $this->hasMany(LeaveRequest::class);
    }
    public function viewLeaveRequests()
    {
    $leaveRequests = LeaveRequest::where('employee_id', auth()->user()->employee->id)
        ->orderBy('created_at', 'desc')
        ->get();

    return view('employee.view-leave-requests', compact('leaveRequests'));
    }

}
