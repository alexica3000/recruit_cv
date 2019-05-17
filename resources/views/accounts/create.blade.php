@extends('layouts.app')

@section('content')
    <main class="main">
        <div class="container">
            <div class="page-head">
                <div class="d-md-flex justify-content-md-between">
                    <div class="item">
                        <h3>Accounts</h3>
                    </div>
                    <div class="item">
                        <div class="d-flex justify-content-md-end">
                            {{--<div><a href="#" class="btn btn-outline-danger">Delete</a></div>--}}
                            <div class="pl-2"><a href="#" class="btn btn-success">Save</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-xl-6">
                    <h3>Account</h3>
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
                                <label for="manage_department">Can manage accounts &amp; departments:</label>
                                <select name="manage_department" id="manage_department" class="form-control select2-init" data-placeholder="Select">
                                    <option></option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection