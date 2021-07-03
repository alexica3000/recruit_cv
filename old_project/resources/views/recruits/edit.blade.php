@extends('layouts.app')

@section('title', 'Recruitment')

@section('buttons')
    <div class="d-flex justify-content-md-end">

        <form action="{{ route('recruits.destroy', $recruit->id) }}" method="post" class="deleteForm">
            @method('DELETE')
            @csrf
            <button class="btn btn-outline-danger softDelete" >Delete</button>
        </form>

        <form action="{{ route('recruits.update', $recruit->id) }}" id="edit" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="pl-2">
                <button class="btn btn-success" type="submit">Save</button>
            </div>
        </form>
    </div>
@endsection


@section('content')

    <div class="row">
        <div class="col-12 col-lg-6">
            <h3>Person</h3>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="name">Name (*)</label>
                        <input form="edit" type="text" class="form-control" name="name" id="name" value="{{ $recruit->name }}">
                        <input type="hidden" class="form-control" name="recruit_id" id="recruit_id" value="{{ $recruit->id }}">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="date_of_birth">Date of birth</label>
                        <div class="input-group datetimepicker-default" id="date_of_birth" data-target-input="nearest">
                            <input form="edit" type="text" class="form-control datetimepicker-input" name="date_of_birth" placeholder="Select date" value="{{ $recruit->date_of_birth->format('d/m/Y')  }}" data-target="#date_of_birth">
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
                        <input form="edit" type="text" class="form-control" name="city" id="city" value="{{ $recruit->city }}">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="job">Job</label>
                        <input form="edit" type="text" class="form-control" name="job" id="job" value="{{ $recruit->job }}">
                    </div>
                </div>
                <div class="col-12 col-md-7">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea form="edit" name="description" id="description" cols="30" rows="10" class="form-control">{{ $recruit->description }}</textarea>
                    </div>
                </div>
                <div class="col-12 col-md-5">
                    <div class="form-group">
                        <label for="city">Photo</label>
                        <div class="kv-avatar">
                            <div class="file-loading">
                                <input form="edit" class="avatar-upload" name="logo" type="file">
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
















{{-- works table --}}

    <div class="card card-primary">

        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div class="item">
                    <h3>Work Experience</h3>
                </div>
                <div class="item">
                    <a href="#" class="btn btn-primary" data-toggle="modal" type-work-ed="works">Add new</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-brand" id="works-table-wo">
                    <thead>
                        <tr>
                            <th width="360">Employer</th>
                            <th>Job</th>
                            <th>Start</th>
                            <th>End On</th>
                            <th>Finished</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="work_tbody">

                        @foreach($recruit->works as $field)
                            @continue($field->type != 1)
                            @include('recruits.row_work')
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div class="item">
                    <h3>Education</h3>
                </div>
                <div class="item">
                    <a href="#" class="btn btn-primary" data-toggle="modal" type-work-ed="educations">Add new</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-brand" id="educations-table-wo">
                    <thead>
                    <tr>
                        <th width="360">Institute</th>
                        <th>Education</th>
                        <th>Start</th>
                        <th>End On</th>
                        <th>Finished</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody id="education_tbody">

                        @foreach($recruit->works as $field)
                            @continue($field->type != 2)
                            @include('recruits.row_work')
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>




    <div class="card card-primary">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div class="item">
                    <h3>Course or Training</h3>
                </div>
                <div class="item">
                    <a href="#" class="btn btn-primary" data-toggle="modal" type-work-ed="courses">Add new</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-brand" id="courses-table-wo">
                    <thead>
                    <tr>
                        <th width="360">Institute</th>
                        <th>Course or Training</th>
                        <th>Start</th>
                        <th>End On</th>
                        <th>Finished</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody id="course_tbody">

                        @foreach($recruit->works as $field)
                            @continue($field->type != 3)
                            @include('recruits.row_work')
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>





    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="item">
                            <h3>Skills</h3>
                        </div>
                        <div class="item">
                            <a href="#" id="add_new_skill" class="btn btn-primary add_new_skill" data-toggle="modal">Add new</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-brand">
                            <thead>
                                <tr>
                                    <th width="240">Skills</th>
                                    <th>Level</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody id="skill_tbody">

                                <tr data-clone-row-skill class="d-none">
                                    <td data-target="char"></td>
                                    <td data-target="description"></td>
                                    <input form="edit" type="hidden" value="" name="skill_id" data-target="skill_id" >
                                    <td class="cell-flex">
                                        <a href="#" class="btn btn-outline-danger delete_skill btn-sm" data-toggle="modal" data-target="#confirmSkillsModal">
                                            <i class="cvd-trash"></i>
                                        </a>
                                    </td>
                                </tr>



                                @foreach($recruit->skills as $fields)
                                    @continue($fields->type != 1)
                                        @include('recruits.row_skill')
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="item">
                            <h3>Characteristics</h3>
                        </div>
                        <div class="item">
                            <a href="#" id="add_new_charac" class="btn btn-primary add_new_skill" data-toggle="modal" >Add new</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-brand">
                            <thead>
                            <tr>
                                <th width="240">Characteristic</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                            </thead>

                            <tbody id="charac_tbody">
                                @foreach($recruit->skills as $fields)
                                    @continue($fields->type != 2)
                                    @include('recruits.row_skill')
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="item">
                            <h3>Social Media</h3>
                        </div>
                        <div class="item">
                            <a href="#" id="add_new_social" class="btn btn-primary add_new_skill" data-toggle="modal" >Add new</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-brand">
                            <thead>
                            <tr>
                                <th width="240">Platform</th>
                                <th>Link</th>
                                <th>Actions</th>
                            </tr>
                            </thead>

                            <tbody id="social_tbody">
                                @foreach($recruit->skills as $fields)
                                    @continue($fields->type != 3)
                                    @include('recruits.row_skill')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="item">
                            <h3>Interests</h3>
                        </div>
                        <div class="item">
                            <a href="#" id="add_new_interest" class="btn btn-primary add_new_skill" data-toggle="modal" >Add new</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-brand">
                            <thead>
                            <tr>
                                <th width="240">Interest</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody id="interest_tbody">
                                @foreach($recruit->skills as $fields)
                                    @continue($fields->type != 4)
                                    @include('recruits.row_skill')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



@push('modals')
    @include('components.confirm', ['title' => 'Confirm remove', 'message' => 'Are you sure you want to remove?', 'action' => 'Remove', 'modalID' => 'confirmDeleteModal'])
@endpush







    <!-- Modals -->

    <div class="modal fade" id="skillModal" tabindex="-1" role="dialog" aria-labelledby="skillModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="#" method="POST" id="skill_form">
                    <div class="modal-header">
                        <h5 class="modal-title trans-skill" id="skillModalLabel"
                            data-trans-1="Add new skill"
                            data-trans-2="Add new characteristics"
                            data-trans-3="Add new social media"
                            data-trans-4="Add new interests"
                        >Create new row</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label id="label_modal_name" for="modal_name" class="trans-skill"
                                   data-trans-1="Skill"
                                   data-trans-2="Characteristic"
                                   data-trans-3="Platform"
                                   data-trans-4="Interest"
                            >Skill</label>
                            <input type="text" class="form-control" name="modal_name" id="modal_name">
                        </div>
                        <div class="form-group">
                            <label for="modal_level">Level</label>
                            <select name="modal_level" id="modal_level" class="form-control select2-init" data-placeholder="Select level">
                                <option></option>
                                <option class="1">Beginner</option>
                                <option class="2">Intermediate</option>
                                <option class="3">Professional</option>
                                <option class="4">Expert</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label id="label_modal_desc" for="modal_description" class="trans-skill"
                                   data-trans-2="Description"
                                   data-trans-3="Link"
                                   data-trans-4="Description"
                            >Skill</label>
                            <textarea name="modal_description" id="modal_description" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" id="submit_skill">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>












    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="#" method="POST" id="form_work">
                    <div class="modal-header">
                        <h5 class="modal-title trans-work" id="editModalLabel"
                            data-trans-works="Add new work experience"
                            data-trans-educations="Add new education"
                            data-trans-courses="Add new course or training"

                            data-ed-trans-works="Edit work experience"
                            data-ed-trans-educations="Edit education"
                            data-ed-trans-courses="Edit course or training"
                        >Edit row</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="form-group">
                            <label for="modal_edit_name" id="label_employer" class="trans-work"
                                   data-trans-works="Employer"
                                   data-trans-educations="Institute"
                                   data-trans-courses="Institute"
                            >Employer</label>
                            <input type="text" class="form-control" name="modal_employer" id="modal_employer">
                        </div>

                        <div class="form-group">
                            <label for="modal_edit_name" id="label_skill" class="trans-work"
                                   data-trans-works="Job"
                                   data-trans-educations="Education"
                                   data-trans-courses="Course or Training"
                            >Skill</label>
                            <input type="text" class="form-control" name="modal_edit_name" id="modal_edit_name">
                        </div>


                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="start_year">Start year</label>
                                    <select name="start_year" id="start_year" class="form-control select2-init" data-placeholder="Select year">
                                        <option></option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="end_year">End year</label>
                                    <select name="end_year" id="end_year" class="form-control select2-init" data-placeholder="Select year">
                                        <option></option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                    </select>
                                </div>
                            </div>

                        <div class="form-group">
                            <label for="modal_edit_description">Description</label>
                            <textarea name="modal_edit_description" id="modal_edit_description" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button id="submit_button" type="button" class="btn btn-primary" data-type="create">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


@push('scripts')
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
@endpush