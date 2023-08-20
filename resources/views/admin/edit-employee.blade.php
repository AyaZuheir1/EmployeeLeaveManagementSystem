
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> edit employee information</div>

                    <div class="card-body">
                        <form action="{{ route('admin.update-employee', ['id' => $employee->id]) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $employee->name }}">
                            </div>
                            <div class="form-group">
                                <label for="email"> email</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ $employee->email }}">
                            </div>
                            <!-- يمكنك إضافة المزيد من حقول المعلومات هنا -->
                            <button type="submit" class="btn btn-primary"> save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
