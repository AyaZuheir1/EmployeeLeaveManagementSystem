@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Leave requests status</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>leave type </th>
                                    <th> start date</th>
                                    <th> days</th>
                                    <th> status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($leaveRequests as $index => $request)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $request->leaveType->name }}</td>
                                        <td>{{ $request->start_date }}</td>
                                        <td>{{ $request->duration_days }} يوم</td>
                                        <td>{{ $request->status }}</td>
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
