@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> dashboard</div>

                    <div class="card-body">
                        <ul>
                            <li><a href="{{ route('manage-leave-types') }}">  manage leave types</a></li>
                            <li><a href="{{ route('view-leave-requests') }}">view leave requests  </a></li>
                            <li><a href="{{ route('admin.manage-employee') }}"> manage employee  </a></li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
