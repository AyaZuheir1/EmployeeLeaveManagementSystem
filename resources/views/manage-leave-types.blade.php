@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Manage Leave Types </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('manage-leave-types') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="leave_type" class="col-md-4 col-form-label text-md-right"> Leave Type</label>
                            <div class="col-md-6">
                                <input id="leave_type" type="text" class="form-control" name="name" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="leave_type" class="col-md-4 col-form-label text-md-right"> description</label>
                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Add Leave Type
                                </button>
                            </div>
                        </div>
                    </form>

                    <hr>

                    <h4> Leave Types:</h4>
                    <ul>
                        @foreach($leaveTypes as $leaveType)
                        <li>
                            {{ $leaveType->name }}
                            <div class="col-md-6">
                                <a href="{{ route('edit.leave-type', ['id' => $leaveType->id]) }}" class="btn btn-sm btn-primary ">edit</a>
                                <a href="{{ route('delete.leave-type', ['id' => $leaveType->id]) }}" class="btn btn-sm btn-danger">delete</a>
                            </div>
                        </li>

                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection