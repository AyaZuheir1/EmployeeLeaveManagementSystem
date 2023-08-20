
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">  add employee </div>

                    <div class="card-body">
                        <form action="{{ route('admin.store-employee') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="email">email </label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label for="department"> department</label>
                                <input type="department" name="department" id="department" class="form-control" value="{{ old('department') }}">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">add employee </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
