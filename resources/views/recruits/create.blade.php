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
                            <input type="hidden" data-name="experience[%index%][employer]" data-target="experience_employer">
                        </td>
                        <td>
                            <span class="caption"></span>
                            <input type="hidden" data-name="experience[%index%][job]" data-target="experience_job">
                        </td>
                        <td>
                            <span class="caption"></span>
                            <input type="hidden" data-name="experience[%index%][start]" data-target="experience_start">
                        </td>
                        <td>
                            <span class="caption"></span>
                            <input type="hidden" data-name="experience[%index%][end]" data-target="experience_end">
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
                            <input type="hidden" data-name="experience[%index%][description]" data-target="experience_description">
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
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#createNewModal">{{ __('Add new') }}</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-brand">
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
                    <tr>
                        <td>Moldova State University</td>
                        <td>PHD in bioinformatics</td>
                        <td>2018</td>
                        <td>2022</td>
                        <td>Yes</td>
                        <td class="cell-flex">
                            <a href="#" class="table-link" data-toggle="modal" data-target="#editModal">
                                <i class="cvd-edit"></i>
                                {{ __('Edit') }}
                            </a>
                            <a href="#" class="table-link" data-table-collapse="#educationRow1">
                                <i class="cvd-arrow-right"></i>
                                {{ __('Open information') }}
                            </a>
                            <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#confirmSkillsModal">
                                <i class="cvd-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <tr class="row-hide" id="educationRow1">
                        <td colspan="6" class="cell-description">
                            Architecto maxime ex maxime possimus dicta. Incidunt dolorem blanditiis unde optio. Molestiae harum sequi voluptas in deleniti totam voluptas atque.
                            <br>
                            Nihil porro voluptatum dolores nulla. Necessitatibus ducimus repellat. Dolorum architecto et commodi nesciunt perferendis autem quam quis. Ducimus commodi officiis.
                            <br>
                            Ex consequatur accusamus. Quis earum molestiae laboriosam repudiandae aut nihil quo rerum laudantium. Accusamus dolorem enim beatae sint qui ullam et ut. Doloribus doloremque ut ipsa eum nam quod.
                        </td>
                    </tr>
                    <tr>
                        <td>Moldova State University</td>
                        <td>PHD in bioinformatics</td>
                        <td>2018</td>
                        <td>2022</td>
                        <td>Yes</td>
                        <td class="cell-flex">
                            <a href="#" class="table-link" data-toggle="modal" data-target="#editModal">
                                <i class="cvd-edit"></i>
                                {{ __('Edit') }}
                            </a>
                            <a href="#" class="table-link" data-table-collapse="#educationRow2">
                                <i class="cvd-arrow-right"></i>
                                {{ __('Open information') }}
                            </a>
                            <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#confirmSkillsModal">
                                <i class="cvd-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <tr class="row-hide" id="educationRow2">
                        <td colspan="6" class="cell-description">
                            Architecto maxime ex maxime possimus dicta. Incidunt dolorem blanditiis unde optio. Molestiae harum sequi voluptas in deleniti totam voluptas atque.
                            <br>
                            Nihil porro voluptatum dolores nulla. Necessitatibus ducimus repellat. Dolorum architecto et commodi nesciunt perferendis autem quam quis. Ducimus commodi officiis.
                            <br>
                            Ex consequatur accusamus. Quis earum molestiae laboriosam repudiandae aut nihil quo rerum laudantium. Accusamus dolorem enim beatae sint qui ullam et ut. Doloribus doloremque ut ipsa eum nam quod.
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
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#createNewModal">{{ __('Add new') }}</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-brand">
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
                    <tr>
                        <td>Moldova State University</td>
                        <td>Scrum Master</td>
                        <td>2018</td>
                        <td>2022</td>
                        <td>Yes</td>
                        <td class="cell-flex">
                            <a href="#" class="table-link" data-toggle="modal" data-target="#editModal">
                                <i class="cvd-edit"></i>
                                {{ __('Edit') }}
                            </a>
                            <a href="#" class="table-link" data-table-collapse="#courseRow1">
                                <i class="cvd-arrow-right"></i>
                                {{ __('Open information') }}
                            </a>
                            <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#confirmSkillsModal">
                                <i class="cvd-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <tr class="row-hide" id="courseRow1">
                        <td colspan="6" class="cell-description">
                            Architecto maxime ex maxime possimus dicta. Incidunt dolorem blanditiis unde optio. Molestiae harum sequi voluptas in deleniti totam voluptas atque.
                            <br>
                            Nihil porro voluptatum dolores nulla. Necessitatibus ducimus repellat. Dolorum architecto et commodi nesciunt perferendis autem quam quis. Ducimus commodi officiis.
                            <br>
                            Ex consequatur accusamus. Quis earum molestiae laboriosam repudiandae aut nihil quo rerum laudantium. Accusamus dolorem enim beatae sint qui ullam et ut. Doloribus doloremque ut ipsa eum nam quod.
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
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#createNewModal">{{ __('Add new') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-brand">
                            <thead>
                            <tr>
                                <th width="240">{{ __('Skills') }}</th>
                                <th>{{ __('Level') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>PHP</td>
                                <td>{{ __('Professional') }}</td>
                                <td class="cell-flex">
                                    <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#confirmSkillsModal">
                                        <i class="cvd-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Java</td>
                                <td>{{ __('Beginner') }}</td>
                                <td class="cell-flex">
                                    <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#confirmSkillsModal">
                                        <i class="cvd-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>SQL</td>
                                <td>{{ __('Intermediate') }}</td>
                                <td class="cell-flex">
                                    <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#confirmSkillsModal">
                                        <i class="cvd-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>HTML & CSS</td>
                                <td>{{ __('Expert') }}</td>
                                <td class="cell-flex">
                                    <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#confirmSkillsModal">
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
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#createNewModal">{{ __('Add new') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-brand">
                            <thead>
                            <tr>
                                <th width="240">{{ __('Characteristic') }}</th>
                                <th>{{ __('Description') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Spontaneous</td>
                                <td>-</td>
                                <td class="cell-flex">
                                    <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#confirmCharacteristicsModal">
                                        <i class="cvd-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Structured</td>
                                <td>I always work based on a good structure</td>
                                <td class="cell-flex">
                                    <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#confirmCharacteristicsModal">
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
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#createNewModal">{{ __('Add new') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-brand">
                            <thead>
                            <tr>
                                <th width="240">{{ __('Platform') }}</th>
                                <th>{{ __('Link') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Facebook</td>
                                <td>https://www.facebook.com/profile/namehere</td>
                                <td class="cell-flex">
                                    <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#confirmSociaModal">
                                        <i class="cvd-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Instagram</td>
                                <td>https://www.instagram.com/namehere</td>
                                <td class="cell-flex">
                                    <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#confirmSociaModal">
                                        <i class="cvd-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Linkedin</td>
                                <td>https://www.linkedin.com/user/namehere</td>
                                <td class="cell-flex">
                                    <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#confirmSociaModal">
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
                            <h3>{{ __('Interests') }}</h3>
                        </div>
                        <div class="item">
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#createNewModal">{{ __('Add new') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-brand">
                            <thead>
                            <tr>
                                <th width="240">{{ __('Interest') }}</th>
                                <th>{{ __('Description') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Movies</td>
                                <td>I really like to watch movies</td>
                                <td class="cell-flex">
                                    <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#confirmInterestsModal">
                                        <i class="cvd-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Mountainbike</td>
                                <td>I like to go biking whenever possible</td>
                                <td class="cell-flex">
                                    <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#confirmInterestsModal">
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
    </div>

@endsection



@push('modals')
    @include('components.confirm', ['title' => 'Confirm remove Work Experience', 'message' => 'Are you sure you want to remove Work Experience?', 'action' => 'Remove', 'modalID' => 'confirmExperienceModal'])

    @include('components.confirm', ['title' => 'Confirm remove Skill', 'message' => 'Are you sure you want to remove Skill?', 'action' => 'Remove', 'modalID' => 'confirmSkillsModal'])
    @include('components.confirm', ['title' => 'Confirm remove Characteristic', 'message' => 'Are you sure you want to remove Characteristic?', 'action' => 'Remove', 'modalID' => 'confirmCharacteristicsModal'])
    @include('components.confirm', ['title' => 'Confirm remove Social Media', 'message' => 'Are you sure you want to remove Social Media?', 'action' => 'Remove', 'modalID' => 'confirmSociaModal'])
    @include('components.confirm', ['title' => 'Confirm remove Interest', 'message' => 'Are you sure you want to remove Interest?', 'action' => 'Remove', 'modalID' => 'confirmInterestsModal'])

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
                                <option value="1">Full Stack Developer</option>
                                <option value="2">Backend Developer</option>
                                <option value="3">Frontend Developer</option>
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
                                <option value="1">Yes</option>
                                <option value="0">No</option>
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

@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
@endpush

