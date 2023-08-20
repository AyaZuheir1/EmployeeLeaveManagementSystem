@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add leave requests  </div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <form action="{{ route('employee-submit-leave') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="leave_type_id"> leave type</label>
                                <select name="leave_type_id" id="leave_type_id" class="form-control">
                                    @foreach($leaveTypes as $leaveType)
                                        <option value="{{ $leaveType->id }}">{{ $leaveType->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="start_date">start date</label>ة</label>
                                <input type="date" name="start_date" id="start_date" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="duration_days"> number of days</label>
                                <input type="number" name="duration_days" id="duration_days" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary"> Add request</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
