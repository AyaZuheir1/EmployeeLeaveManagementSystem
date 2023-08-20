
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header"> employee managment</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>name</th>
                                    <th>email </th>
                                    <th>actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($employees as $employee)
    <tr>
        <td>{{ $employee->id }}</td>
        <td>{{ $employee->name }}</td>
        <td>{{ $employee->email }}</td>
        <td>
            <a href="{{ route('admin.edit-employee', ['id' => $employee->id]) }}" class="btn btn-primary">تعديل</a>
            <form action="{{ route('admin.delete-employee', ['id' => $employee->id]) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد؟')">حذف</button>
            </form>
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
