@extends('layouts.app')


@section('title', 'Departments')


@section('buttons')
    <form id="create" enctype="multipart/form-data" method="post" action="{{ route('departments.store') }}" >
        @csrf
        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection


@section('content')
    <div class="row">
        <div class="col-12">
            <h3>Department</h3>
            <div class="row">
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="department">Department (*)</label>
                        <input form="create" type="text" class="form-control" name="department" id="department" placeholder="Department">
                    </div>
                </div>
                <div class="col-12 col-md-3">
                    <div class="form-group">
                        <label for="logo">Logo (*)</label>

                        <div class="kv-avatar">
                            <div class="file-loading">
                                <input form="create" class="avatar-upload" name="logo" id="logo" type="file">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
