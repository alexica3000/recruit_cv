@extends('layouts.app')


@section('title', 'Accounts')


@section('buttons')
    <form id="create" action="{{ route('accounts.store') }}" method="post">
        @csrf
        <div class="pl-2"><button type="submit" class="btn btn-success">Save</button></div>
    </form>
@endsection


@section('content')
    <div class="row">
        <div class="col-12 col-xl-6">
            <h3>Account</h3>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="name">Name (*)</label>
                        <input form="create" type="text" class="form-control" name="name" id="name" placeholder="Name">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="email">Email (*)</label>
                        <input form="create" type="email" class="form-control" name="email" id="email" placeholder="Email">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input form="create" type="password" class="form-control" name="password" id="password" placeholder="Password">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="confirm_password">Repeat password</label>
                        <input form="create" type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Repeat password">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-xl-3">
            <h3>Settings</h3>
            <div class="row">
                <div class="col-12 col-md-6 col-xl-12">
                    <div class="form-group">
                        <label for="manage_department">Can manage accounts &amp; departments:</label>
                        <select form="create" name="manage_department" id="manage_department" class="form-control select2-init" data-placeholder="Select">
                            <option></option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
