
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard  </div>

                    <div class="card-body">
                        <a href="{{ route('employee.submit-leave') }}" class="btn btn-primary"> Add leave requests </a>
                        <a href="{{ route('employee.leave-requests') }}" class="btn btn-secondary"> requests </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
