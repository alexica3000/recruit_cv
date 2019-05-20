@extends('layouts.app')

@section('title', 'Departments')

@section('buttons')
    <div class="pl-2"><a href="#" class="btn btn-success">Save</a></div>
@endsection

@section('content')

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

@endsection