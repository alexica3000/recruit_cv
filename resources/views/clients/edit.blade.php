@extends('layouts.app')


@section('title', 'Clients')


@section('buttons')
    <div class="d-flex justify-content-md-end">

        <form action="{{ route('clients.destroy', $client->id) }}" method="POST">
            @method('DELETE')
            @csrf
            <button class="btn btn-outline-danger">Delete</button>
        </form>
        <form id="edit" method="post" action="{{ route('clients.update', $client->id) }}">
            @csrf
            @method('patch')
            <div class="pl-2">
                <button class="btn btn-success">Save</button>
            </div>
        </form>

    </div>
@endsection


@section('content')

            <div class="row">
                <div class="col-12 col-xl-6">
                    <h3>Client</h3>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="name">Name (*)</label>
                                <input form="edit" type="text" class="form-control" name="name" id="name" value="{{ $client->name }}">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="email">Email (*)</label>
                                <input form="edit" type="email" class="form-control" name="email" id="email" value="{{ $client->email }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input form="edit" type="password" class="form-control" name="password" id="password" value="{{ $client->password }}">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="confirm_password">Repeat password</label>
                                <input form="edit" type="password" class="form-control" name="confirm_password" id="confirm_password" value="{{ $client->password }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-3">
                    <h3>Settings</h3>
                    <div class="row">
                        <div class="col-12 col-md-6 col-xl-12">
                            <div class="form-group">
                                <label for="department">Department</label>
                                <select form="edit" name="department" id="department" class="form-control select2-init" data-placeholder="Select">
                                    <option></option>
                                    @foreach($departments as $department)
                                        @if($department->id == $client->department_id)
                                            <option selected value="{{ $department->id }}">{{ $department->name }}</option>
                                        @else
                                            <option value="{{ $department->id }}">{{ $department->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection