@extends('layouts.app')


@section('title', 'Departments')


@section('buttons')
    <div class="d-flex justify-content-md-end">

        <form action="{{ route('departments.destroy', $department->id) }}" method="POST">
            @method('DELETE')
            @csrf
            <div class="pl-2">
                <button type="submit" class="btn btn-outline-danger">Delete</button>
            </div>
        </form>

        <form id="edit" enctype="multipart/form-data" method="post" action="{{ route('departments.update', $department->id) }}" >
            @csrf
            @method('PATCH')
            <div class="pl-2">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>

    </div>
@endsection


@section('content')
        <div class="row">
            <div class="col-12">
                <h3>Department</h3>
                <div class="row">
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="department">Department (*)</label>
                            <input form="edit" type="text" class="form-control" name="department" id="department" value="{{ $department->name }}">
                        </div>
                    </div>
                    <div class="col-12 col-md-3">
                        <div class="form-group">
                            <label for="logo">Logo (*)</label>
                            <div class="kv-avatar">

                                <img src="{{ asset('storage/'. $department->logo) }}" id="logo" width="200px" />

                                <div class="file-loading">
                                    <input form="edit" class="avatar-upload" name="logo" id="logo" type="file">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
