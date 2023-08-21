<?php

namespace App\Http\Controllers;

use App\Models\LeaveType;
use App\Models\Employee;
use App\Models\LeaveRequest;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Seeder;

class AdminController extends Controller
{


    public function showManageLeaveTypes()
    {
        $leaveTypes = LeaveType::all();
        return view('manage-leave-types', ['leaveTypes' => $leaveTypes]);
    }
    public function addLeaveType(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:leave_types,name',
        ]);

        LeaveType::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('manage-leave-types')->with('success', 'تمت إضافة نوع الإجازة بنجاح.');
    }
    public function manageEmployees()
    {
        $employees = Employee::all();
        return view('admin.manage-employee', compact('employees'));
    }
    public function editEmployee($id)
    {
        $employee = Employee::findOrFail($id);
        return view('admin.edit-employee', compact('employee'));
    }
    public function updateEmployee(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $employee->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        return redirect()->route('admin.manage-employee')->with('success', 'تم تحديث معلومات الموظف بنجاح.');
    }

    public function deleteEmployee($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->route('admin.manage-employee')->with('success', 'تم حذف الموظف بنجاح.');
    }
    public function addEmployee()
    {
        return view('admin.add-employee');
    }

    public function storeEmployee(Request $request)
    {
        //  dd(Auth::user());


        $user = auth()->user();
        $user_id = $user->id;
        $user = User::all()->where('id', $user_id)->pluck('id');
        $id = $user->first();
        //  dd($user);
        $this->validate($request, [

            'name' => 'required',
            'email' => 'required|email|unique:employees',
        ]);

        Employee::create([
            'user_id' => $id,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'department' => $request->input('department'),
        ]);



        return redirect()->route('admin.manage-employee')->with('success', 'تم إضافة الموظف بنجاح.');
    }

    public function editLeaveType($id)
    {
        $leaveType = LeaveType::findOrFail($id);
        return view('edit-leave-type', ['leaveType' => $leaveType]);
    }
    public function deleteLeaveType($id)
    {
        $leaveType = LeaveType::findOrFail($id);
        $leaveType->delete();
        return redirect()->route('manage-leave-types')->with('success', 'تم حذف نوع الإجازة بنجاح.');
    }
    public function updateLeaveType(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);

        $leaveType = LeaveType::findOrFail($id);

        $leaveType->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('manage-leave-types')->with('success', 'تم تحديث نوع الإجازة بنجاح.');
    }
    public function approveLeaveRequest($id)
    {
        $leaveRequest = LeaveRequest::findOrFail($id);
        $leaveRequest->update(['status' => 'Approve']);
        return redirect()->route('view-leave-requests')->with('success', 'تم الموافقة على الطلب.');
    }

    public function denyLeaveRequest($id)
    {
        $leaveRequest = LeaveRequest::findOrFail($id);
        $leaveRequest->update(['status' => 'Deny']);
        return redirect()->route('view-leave-requests')->with('success', 'تم رفض الطلب.');
    }
    public function viewLeaveRequests()
    {
        $leaveRequests = LeaveRequest::all();
        return view('view-leave-requests', ['leaveRequests' => $leaveRequests]);
    }
    public function processLeaveRequest(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required|in:موافقة,رفض',
        ]);

        $leaveRequest = LeaveRequest::findOrFail($id);

        if ($request->input('status') === 'موافقة') {
            $leaveRequest->update(['status' => 'موافقة']);
        } elseif ($request->input('status') === 'رفض') {


            $leaveRequest->update([
                'status' => 'رفض',
            ]);
        }

        return redirect()->route('view-leave-requests')->with('success', 'تمت معالجة طلب الإجازة بنجاح.');
    }
}
