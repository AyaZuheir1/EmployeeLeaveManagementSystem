<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\LeaveRequest;
use App\Models\LeaveType;
use App\Models\User;

class EmployeeController extends Controller
{

    public function showSubmitLeave()
    {
        $leaveTypes = LeaveType::all();
      
        return view('employee.submit-leave', ['leaveTypes' => $leaveTypes]);
    }

    public function submitLeave(Request $request)
    {
        $user = auth()->user(); 
        $user_id = $user->id;
        $this->validate($request, [
            'leave_type_id' => 'required',
            'start_date' => 'required|date',
            'duration_days' => 'required|integer|min:1',
        ]);
     

        LeaveRequest::create([
            'employee_id' => $user_id,
            'leave_type_id' => $request->input('leave_type_id'),
            'start_date' => $request->input('start_date'),
            'duration_days' => $request->input('duration_days'),
            'status' => 'قيد المراجعة', 
        ]);

        return redirect()->route('employee.submit-leave')->with('success', 'تم تقديم الطلب بنجاح.');
    }
    public function viewLeaveRequests()
    {
        $user = auth()->user(); 
        $user_id = $user->id;
       
        // $leaveRequests = LeaveRequest::where('employee_id', $user_id)
        //     ->orderBy('created_at', 'desc')
        //     ->get();

        // return view('employee.view-leave-requests', compact('leaveRequests'));
        $leaveRequests = LeaveRequest::all()->where('employee_id', $user_id); 
    return view('employee.view-leave-requests', ['leaveRequests' => $leaveRequests]);
        // $leaveRequests = LeaveRequest::with('employee')->get();  // استرجاع جميع طلبات الإجازات
        // return view('employee.view-leave-requests', ['leaveRequests' => $leaveRequests]);
    }
    public function dashboard()
    {
        return view('employee.dashboard');
    }
}
