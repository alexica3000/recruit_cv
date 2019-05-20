@extends('layouts.app')

@section('title', 'Clients')

@section('buttons')
    <div class="pl-2"><a href="#" class="btn btn-success">Save</a></div>
@endsection


@section('content')

    <div class="row">
                <div class="col-12 col-xl-6">
                    <h3>Client</h3>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="name">Name (*)</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="email">Email (*)</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="confirm_password">Repeat password</label>
                                <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Repeat password">
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
                                <select name="department" id="department" class="form-control select2-init" data-placeholder="Select">
                                    <option></option>
                                    <option value="1">Department A</option>
                                    <option value="2">Department B</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

@endsection