@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>طلبات الإجازات</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th> employee name</th>
                        <th>leave type </th>
                        <th>start date </th>
                        <th>duration</th>
                        <th>status</th>
                    </tr>
                </thead>
                <tbody>
            @foreach($leaveRequests as $index => $request)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $request->employee_name }}</td>
                    <td>{{ $request->leave_type }}</td>
                    <td>{{ $request->start_date }}</td>
                    <td>{{ $request->duration }} يوم</td>
                    <td>{{ $request->status }}</td>
                </tr>
            @endforeach
        </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
