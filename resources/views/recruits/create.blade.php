@extends('layouts.app')

@section('title', 'Recruitment')

@section('buttons')
    <form action="{{ route('recruits.store') }}" id="create" method="post">
        @csrf
        <div class="pl-2">
            <button class="btn btn-success" type="submit">Save</button>
        </div>
    </form>
@endsection


@section('content')

    <div class="row">
        <div class="col-12 col-lg-6">
            <h3>Person</h3>
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="name">Name (*)</label>
                        <input form="create" type="text" class="form-control" name="name" id="name" placeholder="Name">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="date_of_birth">Date of birth</label>
                        <div class="input-group datetimepicker-default" id="date_of_birth" data-target-input="nearest">
                            <input form="create"  type="text" class="form-control datetimepicker-input" name="date_of_birth" placeholder="Select date" data-target="#date_of_birth">
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
                        <input form="create"  type="text" class="form-control" name="city" id="city" placeholder="City">
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="job">Job</label>
                        <input form="create"  type="text" class="form-control" name="job" id="job" placeholder="Job">
                    </div>
                </div>
                <div class="col-12 col-md-7">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea form="create" name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>
                <div class="col-12 col-md-5">
                    <div class="form-group">
                        <label for="city">Photo</label>
                        <div class="kv-avatar">
                            <div class="file-loading">
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








    <div class="card card-primary">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div class="item">
                    <h3>{{ __('Work Experience') }}</h3>
                </div>
                <div class="item">
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#experienceModal">{{ __('Add new') }}</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-brand" id="experienceTable">
                    <thead>
                    <tr>
                        <th width="360">{{ __('Employer') }}</th>
                        <th>{{ __('Job') }}</th>
                        <th>{{ __('Start') }}</th>
                        <th>{{ __('End On') }}</th>
                        <th>{{ __('Finished') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr data-clone class="d-none">
                        <td>
                            <span class="caption"></span>
                            <input form="create" type="hidden" data-name="experience[%index%][employer]" data-target="experience_employer">
                        </td>
                        <td>
                            <span class="caption"></span>
                            <input form="create" type="hidden" data-name="experience[%index%][job]" data-target="experience_job">
                        </td>
                        <td>
                            <span class="caption"></span>
                            <input form="create" type="hidden" data-name="experience[%index%][start]" data-target="experience_start">
                        </td>
                        <td>
                            <span class="caption"></span>
                            <input form="create" type="hidden" data-name="experience[%index%][end]" data-target="experience_end">
                        </td>
                        <td>
                            <span class="caption"></span>
                            <input type="hidden" data-name="experience[%index%][finished]" data-target="experience_finished">
                        </td>
                        <td class="cell-flex">
                            <a href="#" class="table-link" data-row-edit="#experienceModal">
                                <i class="cvd-edit"></i>
                                {{ __('Edit') }}
                            </a>
                            <a href="#" class="table-link" data-table-collapse="#experienceRow%index%">
                                <i class="cvd-arrow-right"></i>
                                {{ __('Open information') }}
                            </a>
                            <a href="#" class="btn btn-outline-danger btn-sm" data-row-remove="#confirmExperienceModal">
                                <i class="cvd-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <tr data-clone class="row-hide" id="experienceRow%index%">
                        <td colspan="6" class="cell-description">
                            <span class="caption"></span>
                            <input form="create" type="hidden" data-name="experience[%index%][description]" data-target="experience_description">
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card card-primary">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div class="item">
                    <h3>{{ __('Education') }}</h3>
                </div>
                <div class="item">
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#educationModal">{{ __('Add new') }}</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-brand" id="educationTable">
                    <thead>
                    <tr>
                        <th width="360">{{ __('Institute') }}</th>
                        <th>{{ __('Education') }}</th>
                        <th>{{ __('Start') }}</th>
                        <th>{{ __('End On') }}</th>
                        <th>{{ __('Finished') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr data-clone class="d-none">
                            <td>
                                <span class="caption"></span>
                                <input form="create" type="hidden" data-name="education[%index%][employer]" data-target="education_employer">
                            </td>
                            <td>
                                <span class="caption"></span>
                                <input form="create" type="hidden" data-name="education[%index%][job]" data-target="education_job">
                            </td>
                            <td>
                                <span class="caption"></span>
                                <input form="create" type="hidden" data-name="education[%index%][start]" data-target="education_start">
                            </td>
                            <td>
                                <span class="caption"></span>
                                <input form="create" type="hidden" data-name="education[%index%][end]" data-target="education_end">
                            </td>
                            <td>
                                <span class="caption"></span>
                                <input type="hidden" data-name="education[%index%][finished]" data-target="education_finished">
                            </td>
                            <td class="cell-flex">
                                <a href="#" class="table-link" data-row-edit="#educationModal">
                                    <i class="cvd-edit"></i>
                                    {{ __('Edit') }}
                                </a>
                                <a href="#" class="table-link" data-table-collapse="#educationRow%index%">
                                    <i class="cvd-arrow-right"></i>
                                    {{ __('Open information') }}
                                </a>
                                <a href="#" class="btn btn-outline-danger btn-sm" data-row-remove="#confirmEducationModal">
                                    <i class="cvd-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <tr data-clone class="row-hide" id="educationRow%index%">
                            <td colspan="6" class="cell-description">
                                <span class="caption"></span>
                                <input form="create" type="hidden" data-name="education[%index%][description]" data-target="education_description">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card card-primary">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div class="item">
                    <h3>{{ __('Course or Training') }}</h3>
                </div>
                <div class="item">
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#courseModal">{{ __('Add new') }}</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-brand" id="courseTable">
                    <thead>
                    <tr>
                        <th width="360">{{ __('Institute') }}</th>
                        <th>{{ __('Course or Training') }}</th>
                        <th>{{ __('Start') }}</th>
                        <th>{{ __('End On') }}</th>
                        <th>{{ __('Finished') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr data-clone class="d-none">
                            <td>
                                <span class="caption"></span>
                                <input form="create" type="hidden" data-name="course[%index%][employer]" data-target="course_employer">
                            </td>
                            <td>
                                <span class="caption"></span>
                                <input form="create" type="hidden" data-name="course[%index%][job]" data-target="course_job">
                            </td>
                            <td>
                                <span class="caption"></span>
                                <input form="create" type="hidden" data-name="course[%index%][start]" data-target="course_start">
                            </td>
                            <td>
                                <span class="caption"></span>
                                <input form="create" type="hidden" data-name="course[%index%][end]" data-target="course_end">
                            </td>
                            <td>
                                <span class="caption"></span>
                                <input type="hidden" data-name="course[%index%][finished]" data-target="course_finished">
                            </td>
                            <td class="cell-flex">
                                <a href="#" class="table-link" data-row-edit="#courseModal">
                                    <i class="cvd-edit"></i>
                                    {{ __('Edit') }}
                                </a>
                                <a href="#" class="table-link" data-table-collapse="#courseRow%index%">
                                    <i class="cvd-arrow-right"></i>
                                    {{ __('Open information') }}
                                </a>
                                <a href="#" class="btn btn-outline-danger btn-sm" data-row-remove="#confirmCourseModal">
                                    <i class="cvd-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <tr data-clone class="row-hide" id="courseRow%index%">
                            <td colspan="6" class="cell-description">
                                <span class="caption"></span>
                                <input form="create" type="hidden" data-name="course[%index%][description]" data-target="course_description">
                            </td>
                        </tr>
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
                            <h3>{{ __('Skills') }}</h3>
                        </div>
                        <div class="item">
                            <a href="#" class="btn btn-primary add-skill-cr" data-toggle="modal" type-skill-cr="skills">{{ __('Add new') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-brand" id="skills-table-cr">
                            <thead>
                            <tr>
                                <th width="240">{{ __('Skills') }}</th>
                                <th>{{ __('Level') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>

                                <tr data-clone-row-skill-cr class="d-none">
                                    <td data-target="char"></td>
                                    <input form="create" type="hidden" data-name="%typeOfSkill%[%index%][char]" data-target="char">
                                    <td data-target="description"></td>
                                    <input form="create" type="hidden" data-name="%typeOfSkill%[%index%][description]" data-target="description">
                                    <input form="edit" type="hidden" value="" name="skill_id" data-target="skill_id" >
                                    <td class="cell-flex">
                                        <a href="#" class="btn btn-outline-danger btn-sm" data-row-remove-cr="#confirm%typeOfSkill%Modal">
                                            <i class="cvd-trash"></i>
                                        </a>
                                    </td>
                                </tr>

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
                            <h3>{{ __('Characteristics') }}</h3>
                        </div>
                        <div class="item">
                            <a href="#" class="btn btn-primary add-skill-cr" data-toggle="modal" type-skill-cr="characteristics">{{ __('Add new') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-brand" id="characteristics-table-cr">
                            <thead>
                            <tr>
                                <th width="240">{{ __('Characteristic') }}</th>
                                <th>{{ __('Description') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>

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
                            <h3>{{ __('Social Media') }}</h3>
                        </div>
                        <div class="item">
                            <a href="#" class="btn btn-primary add-skill-cr" data-toggle="modal" type-skill-cr="social">{{ __('Add new') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-brand" id="social-table-cr">
                            <thead>
                            <tr>
                                <th width="240">{{ __('Platform') }}</th>
                                <th>{{ __('Link') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>

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
                            <h3>{{ __('Interests') }}</h3>
                        </div>
                        <div class="item">
                            <a href="#" class="btn btn-primary add-skill-cr" data-toggle="modal" type-skill-cr="interests">{{ __('Add new') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-brand" id="interests-table-cr">
                            <thead>
                            <tr>
                                <th width="240">{{ __('Interest') }}</th>
                                <th>{{ __('Description') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



@push('modals')
    @include('components.confirm', ['title' => 'Confirm remove Work Experience', 'message' => 'Are you sure you want to remove Work Experience?', 'action' => 'Remove', 'modalID' => 'confirmExperienceModal'])
    @include('components.confirm', ['title' => 'Confirm remove Education', 'message' => 'Are you sure you want to remove Education?', 'action' => 'Remove', 'modalID' => 'confirmEducationModal'])
    @include('components.confirm', ['title' => 'Confirm remove Course', 'message' => 'Are you sure you want to remove Course?', 'action' => 'Remove', 'modalID' => 'confirmCourseModal'])

    @include('components.confirm', ['title' => 'Confirm remove Skill', 'message' => 'Are you sure you want to remove Skill?', 'action' => 'Remove', 'modalID' => 'confirmskillsModal'])
    @include('components.confirm', ['title' => 'Confirm remove Characteristic', 'message' => 'Are you sure you want to remove Characteristic?', 'action' => 'Remove', 'modalID' => 'confirmcharacteristicsModal'])
    @include('components.confirm', ['title' => 'Confirm remove Social Media', 'message' => 'Are you sure you want to remove Social Media?', 'action' => 'Remove', 'modalID' => 'confirmsocialModal'])
    @include('components.confirm', ['title' => 'Confirm remove Interest', 'message' => 'Are you sure you want to remove Interest?', 'action' => 'Remove', 'modalID' => 'confirminterestsModal'])

    {{-- Modal for Work Experience Table --}}

    <div class="modal fade" id="experienceModal" tabindex="-1" role="dialog" aria-labelledby="experienceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title trans" id="experienceModalLabel"
                        data-trans-edit="{{ __('Edit new experience row') }}"
                        data-trans-create="{{ __('Create new experience row') }}"
                    >{{ __('Create new experience row') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" id="addExperienceForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="experience_employer">{{ __('Employer') }}</label>
                            <input type="text" class="form-control" name="employer" id="experience_employer">
                        </div>
                        <div class="form-group">
                            <label for="experience_job">{{ __('Job') }}</label>
                            <select name="job" id="experience_job" class="form-control select2-init" data-placeholder="{{ __('Select job ..') }}">
                                <option></option>
                                <option value="Full Stack Developer">Full Stack Developer</option>
                                <option value="Backend Developer">Backend Developer</option>
                                <option value="Frontend Developer">Frontend Developer</option>
                            </select>
                        </div>
                        <div class="row row-xs">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="modal_link">{{ __('Start year') }}</label>
                                    <select name="start" id="experience_start" class="form-control select2-init" data-placeholder="{{ __('Select start year ..') }}">
                                        <option></option>
                                        <option class="2015">2015</option>
                                        <option class="2016">2016</option>
                                        <option class="2017">2017</option>
                                        <option class="2018">2018</option>
                                        <option class="2018">2019</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="modal_link">{{ __('End year') }}</label>
                                    <select name="end" id="experience_end" class="form-control select2-init" data-placeholder="{{ __('Select end year ..') }}">
                                        <option></option>
                                        <option class="2015">2015</option>
                                        <option class="2016">2016</option>
                                        <option class="2017">2017</option>
                                        <option class="2018">2018</option>
                                        <option class="2018">2019</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="experience_finished">{{ __('Finished') }}</label>
                            <select name="finished" id="experience_finished" class="form-control select2-init" data-placeholder="{{ __('Select finished ..') }}">
                                <option></option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="experience_description">{{ __('Description') }}</label>
                            <textarea name="description" id="experience_description" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
                        <button type="submit"
                                class="btn btn-primary trans"
                                id="addExperienceButton"
                                data-trans-edit="{{ __('Update') }}"
                                data-trans-create="{{ __('Save') }}"
                                data-target="#experienceTable">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal for Education Table --}}

    <div class="modal fade" id="educationModal" tabindex="-1" role="dialog" aria-labelledby="educationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title trans" id="educationModalLabel"
                        data-trans-edit="{{ __('Edit new education row') }}"
                        data-trans-create="{{ __('Create new education row') }}"
                    >{{ __('Create new education row') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" id="addEducationForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="education_employer">{{ __('Institute') }}</label>
                            <input type="text" class="form-control" name="employer" id="education_employer">
                        </div>
                        <div class="form-group">
                            <label for="education_job">{{ __('Education') }}</label>
                            <input type="text" class="form-control" name="job" id="education_job">



{{--
                            <select name="job" id="education_job" class="form-control select2-init" data-placeholder="{{ __('Select job ..') }}">
                                <option></option>
                                <option value="1">Full Stack Developer</option>
                                <option value="2">Backend Developer</option>
                                <option value="3">Frontend Developer</option>
                            </select>
                            --}}
                        </div>
                        <div class="row row-xs">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="modal_link">{{ __('Start year') }}</label>
                                    <select name="start" id="education_start" class="form-control select2-init" data-placeholder="{{ __('Select start year ..') }}">
                                        <option></option>
                                        <option class="2015">2015</option>
                                        <option class="2016">2016</option>
                                        <option class="2017">2017</option>
                                        <option class="2018">2018</option>
                                        <option class="2018">2019</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="modal_link">{{ __('End year') }}</label>
                                    <select name="end" id="education_end" class="form-control select2-init" data-placeholder="{{ __('Select end year ..') }}">
                                        <option></option>
                                        <option class="2015">2015</option>
                                        <option class="2016">2016</option>
                                        <option class="2017">2017</option>
                                        <option class="2018">2018</option>
                                        <option class="2018">2019</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="education_finished">{{ __('Finished') }}</label>
                            <select name="finished" id="education_finished" class="form-control select2-init" data-placeholder="{{ __('Select finished ..') }}">
                                <option></option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="education_description">{{ __('Description') }}</label>
                            <textarea name="description" id="education_description" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
                        <button type="submit"
                                class="btn btn-primary trans"
                                id="addEducationButton"
                                data-trans-edit="{{ __('Update') }}"
                                data-trans-create="{{ __('Save') }}"
                                data-target="#educationTable">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal for Course Table --}}

    <div class="modal fade" id="courseModal" tabindex="-1" role="dialog" aria-labelledby="courseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title trans" id="courseModalLabel"
                        data-trans-edit="{{ __('Edit new course row') }}"
                        data-trans-create="{{ __('Create new course row') }}"
                    >{{ __('Create new course row') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" id="addCourseForm">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="course_employer">{{ __('Institute') }}</label>
                            <input type="text" class="form-control" name="employer" id="course_employer">
                        </div>
                        <div class="form-group">
                            <label for="course_job">{{ __('Course or Training') }}</label>
                            <input type="text" class="form-control" name="job" id="course_job">



                            {{--
                            <select name="job" id="course_job" class="form-control select2-init" data-placeholder="{{ __('Select job ..') }}">
                                <option></option>
                                <option value="1">Full Stack Developer</option>
                                <option value="2">Backend Developer</option>
                                <option value="3">Frontend Developer</option>
                            </select>
                            --}}


                        </div>
                        <div class="row row-xs">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="modal_link">{{ __('Start year') }}</label>
                                    <select name="start" id="course_start" class="form-control select2-init" data-placeholder="{{ __('Select start year ..') }}">
                                        <option></option>
                                        <option class="2015">2015</option>
                                        <option class="2016">2016</option>
                                        <option class="2017">2017</option>
                                        <option class="2018">2018</option>
                                        <option class="2018">2019</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="modal_link">{{ __('End year') }}</label>
                                    <select name="end" id="course_end" class="form-control select2-init" data-placeholder="{{ __('Select end year ..') }}">
                                        <option></option>
                                        <option class="2015">2015</option>
                                        <option class="2016">2016</option>
                                        <option class="2017">2017</option>
                                        <option class="2018">2018</option>
                                        <option class="2018">2019</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="course_finished">{{ __('Finished') }}</label>
                            <select name="finished" id="course_finished" class="form-control select2-init" data-placeholder="{{ __('Select finished ..') }}">
                                <option></option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="course_description">{{ __('Description') }}</label>
                            <textarea name="description" id="course_description" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
                        <button type="submit"
                                class="btn btn-primary trans"
                                id="addCourseButton"
                                data-trans-edit="{{ __('Update') }}"
                                data-trans-create="{{ __('Save') }}"
                                data-target="#courseTable">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    {{-- Modal for Skills Table --}}
    <div class="modal fade" id="skillModalCr" tabindex="-1" role="dialog" aria-labelledby="skillModalCrLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="#" method="POST" id="skill_form">
                    <div class="modal-header">
                        <h5 class="modal-title trans-skill" id="skillModalCrLabel"
                            data-trans-skills="Add new skill"
                            data-trans-characteristics="Add new characteristics"
                            data-trans-social="Add new social media"
                            data-trans-interests="Add new interests"
                        >Create new row</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label id="label_modal_name" for="modal_name" class="trans-skill"
                                   data-trans-skills="Skill"
                                   data-trans-characteristics="Characteristic"
                                   data-trans-social="Platform"
                                   data-trans-interests="Interest"
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
                                   data-trans-characteristics="Description"
                                   data-trans-social="Link"
                                   data-trans-interests="Description"
                            >Skill</label>
                            <textarea name="modal_description" id="modal_description" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" id="submit_skill-cr">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
@endpush

