@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">edit leave type</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update.leave-type', ['id' => $leaveType->id]) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="leave_type" class="col-md-4 col-form-label text-md-right"> leave type</label>
                            <div class="col-md-6">
                                <input id="leave_type" type="text" class="form-control" name="name" value="{{ $leaveType->name }}" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">description</label>
                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="{{ $leaveType->description }}" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                     save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
