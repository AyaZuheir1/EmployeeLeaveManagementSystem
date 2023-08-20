<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'role:employee']], function () {
    Route::get('/employee', [EmployeeController::class ,'dashboard'])->name('employee-dashboard');

    Route::get('/employee/submit-leave', [EmployeeController::class ,'showSubmitLeave']);
    
    Route::post('/employee/submit-leave', [EmployeeController::class ,'submitLeave'])->name('employee-submit-leave');
    Route::get('/view-leave-requests', [EmployeeController::class ,'viewLeaveRequests'])->name('view-leave-requests');

});


Route::group(['middleware' => ['auth', 'role:admin']], function () {
    
    Route::get('/admin-dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::get('/manage-leave-types', [AdminController::class ,'showManageLeaveTypes'])->name('manage-leave-types');;
    Route::post('/manage-leave-types', [AdminController::class ,'addLeaveType'])->name('manage-leave-types');
    
    Route::get('/edit-leave-type/{id}', [AdminController::class, 'editLeaveType'])->name('edit.leave-type');
    Route::post('/update-leave-type/{id}', [AdminController::class, 'updateLeaveType'])->name('update.leave-type');
    Route::get('/delete-leave-type/{id}', [AdminController::class, 'deleteLeaveType'])->name('delete.leave-type');
    /////////////////////////////////////////////////
    
    Route::get('/admin/manage-employee', [AdminController::class ,'manageEmployees'])->name('admin.manage-employee');
    
    Route::get('/admin/edit-employee/{id}', [AdminController::class ,'editEmployee'])->name('admin.edit-employee');
    Route::put('/admin/update-employee/{id}', [AdminController::class ,'updateEmployee'])->name('admin.update-employee');
    
    Route::delete('/admin/delete-employee/{id}', [AdminController::class ,'deleteEmployee'])->name('admin.delete-employee');
    Route::get('/admin/add-employee', [AdminController::class ,'addEmployee'])->name('admin.add-employee');
    Route::post('/admin/store-employee', [AdminController::class ,'storeEmployee'])->name('admin.store-employee');
    //////////////////////////////////////////////
    
    
    Route::get('/view-leave-requests', [AdminController::class ,'viewLeaveRequests'])->name('view-leave-requests');
    Route::get('/approve-leave-request/{id}', [AdminController::class ,'approveLeaveRequest'])->name('approve.leave-request');
    Route::get('/deny-leave-request/{id}', [AdminController::class ,'denyLeaveRequest'])->name('deny.leave-request');
    Route::post('/process-leave-request/{id}', [AdminController::class ,'processLeaveRequest'])->name('process.leave-request');

});



