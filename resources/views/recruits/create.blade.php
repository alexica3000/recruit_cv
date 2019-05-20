@extends('layouts.app')

@section('title', 'Recruitment')

@section('buttons')
    <div class="pl-2"><a href="#" class="btn btn-success">Save</a></div>
@endsection


@section('content')

    <div class="row">
                <div class="col-12 col-lg-6">
                    <h3>Person</h3>
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="name">Name (*)</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="date_of_birth">Date of birth</label>
                                <div class="input-group datetimepicker-default" id="date_of_birth" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" name="date_of_birth" placeholder="Select date" data-target="#date_of_birth">
                                    <div class="input-group-append" data-target="#date_of_birth" data-toggle="datetimepicker">
                                        <div class="input-group-text">
                                            <i class="cvd-calendar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control" name="city" id="city" placeholder="City">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="job">Job</label>
                                <input type="text" class="form-control" name="job" id="job" placeholder="Job">
                            </div>
                        </div>
                        <div class="col-12 col-md-7">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-12 col-md-5">
                            <div class="form-group">
                                <label for="city">Photo</label>
                                <div class="kv-avatar">
                                    <div class="{{url('file-loading')}}">
                                        <input class="avatar-upload" name="logo" type="file">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <h3>Department share</h3>
                            <div class="form-group">
                                <label for="department_link_1">Department Best4u link</label>
                                <div class="copy-field">
                                    <input type="text" class="form-control disabled" disabled="" name="department_links[]" id="department_link_1" value="https://google.com">
                                    <i class="cvd-link copyToClipboard" data-url="https://google.com"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="department_link_2">Department VCI link</label>
                                <div class="copy-field">
                                    <input type="text" class="form-control disabled" disabled="" name="department_links[]" id="department_link_2" value="https://apple.com">
                                    <i class="cvd-link copyToClipboard" data-url="https://apple.com"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <h3>Client share</h3>
                            <div class="form-group">
                                <label for="add_client">Add client</label>
                                <div class="dynamic-group">
                                    <div class="dynamic-header">
                                        <select name="add_client" id="add_client" class="form-control select2-init" data-dynamic-name="clients[]" data-placeholder="Add client">
                                            <option></option>
                                            <option value="1">Client A</option>
                                            <option value="2">Client B</option>
                                            <option value="3">Client C</option>
                                            <option value="4">Client D</option>
                                            <option value="5">Client E</option>
                                            <option value="6">Client F</option>
                                        </select>
                                        <a href="#" class="dynamic-btn d-none" data-dynamic-add=""></a>
                                    </div>
                                    <div class="dynamic-body">
                                        <label>Selected clients</label>
                                        <div class="item">
                                            <div class="form-control disabled">Client A</div>
                                            <a href="#" class="dynamic-btn danger" data-dynamic-remove="">
                                                <i class="cvd-close"></i>
                                            </a>
                                            <input type="hidden" name="clients[]" value="1">
                                        </div>
                                        <div class="item">
                                            <div class="form-control disabled">Client B</div>
                                            <a href="#" class="dynamic-btn danger" data-dynamic-remove="">
                                                <i class="cvd-close"></i>
                                            </a>
                                            <input type="hidden" name="clients[]" value="2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

@endsection