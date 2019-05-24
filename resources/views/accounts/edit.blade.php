@extends('layouts.app')

@section('title', 'Accounts')

@section('buttons')
    <div class="d-flex justify-content-md-end">

        <form action="{{ route('accounts.destroy', $account->id) }}" method="POST">
            @method('DELETE')
            @csrf
            <button class="btn btn-outline-danger">Delete</button>
        </form>

        <form method="post" action="{{ route('accounts.update', $account->id) }}">
            <div class="pl-2"><button class="btn btn-success" type="submit">Save</button></div>

        {{--<div><a href="#" class="btn btn-outline-danger">Delete</a></div>--}}
        {{--<a href="#" class="btn btn-success">Save</a>--}}
    </div>
@endsection


@section('content')

    @csrf
    @method('PATCH')
            <div class="row">
                <div class="col-12 col-xl-6">
                    <h3>Account</h3>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="name">Name (*)</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{$account->name}}">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="email">Email (*)</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{$account->email}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" value="{{$account->password}}">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="confirm_password">Repeat password</label>
                                <input type="password" class="form-control" name="confirm_password" id="confirm_password" value="{{$account->password}}">
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
                                <select name="manage_department" id="manage_department" class="form-control select2-init" >

                                        @if($account->manage==1)
                                            <option value="1" selected>Yes</option>
                                            <option value="0">No</option>
                                        @else
                                            <option value="1">Yes</option>
                                            <option value="0" selected>No</option>
                                        @endif
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
@endsection