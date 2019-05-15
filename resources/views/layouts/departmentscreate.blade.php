@extends('layouts.app')

@section('content')
    <main class="main">
        <div class="container">
            <div class="page-head">
                <div class="d-md-flex justify-content-md-between">
                    <div class="item">
                        <h3>Departments</h3>
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
                <div class="col-12">
                    <h3>Department</h3>
                    <div class="row">
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label for="department">Department (*)</label>
                                <input type="text" class="form-control" name="department" id="department" placeholder="Department">
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <div class="form-group">
                                <label for="logo">Logo (*)</label>
                                <div class="kv-avatar">
                                    {{--<div class="file-loading">--}}
                                        {{--<input class="avatar-upload" name="logo" id="logo" type="file">--}}
                                    {{--</div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection