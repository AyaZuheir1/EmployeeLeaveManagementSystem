<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeaveRequest;

class LeaveRequestController extends Controller
{
    public function index()
    {
        $leaveRequests = LeaveRequest::with('employee')->get();  // استرجاع جميع طلبات الإجازات
        return view('leave-requests', ['leaveRequests' => $leaveRequests]);
    }
    public function showForm()
    { 
        return view('leave-request');
     }
}
