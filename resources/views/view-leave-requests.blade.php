@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">manage leave requests</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>employss</th>
                                <th>leave type </th>
                                <th>start date </th>
                                <th>duration</th>
                                <th>status</th>
                                <th>الإجراءات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($leaveRequests as $request)
                            <tr>
                                <td>
                                    {{ $request->employee->name }}
                                </td>
                                <td>{{ $request->leaveType->name }}</td>
                                <td>{{ $request->start_date }}</td>
                                <td>{{ $request->duration_days }}</td>
                                <td>{{ $request->status }}</td>
                                <!-- ... بيانات الطلب -->
                                <td>
                                    @if($request->status === 'قيد المراجعة')
                                    <form action="{{ route('process.leave-request', ['id' => $request->id]) }}" method="POST">
                                        @csrf
                                        <select name="status">
                                            <option value="موافقة">Approve</option>
                                            <option value="رفض">Deny</option>
                                            
                                        </select>
                  
                                        <button type="submit">ok</button>
                                    </form>
                                    @else
                                    {{ $request->status }}
                                    @endif
                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection