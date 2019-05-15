@extends('layouts.app')

@section('content')
    <main class="main">
        <div class="container">
            <div class="page-head">
                <div class="d-md-flex justify-content-md-between">
                    <div class="item">
                        <h3>Recruitment</h3>
                    </div>
                    <div class="item">
                        <div class="d-flex justify-content-md-end">

                            <form action="{{ route('recruitment.destroy', ['id'=>2]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-outline-danger">Delete</button>
                            </form>


                            {{--<div><a href="{{route('recruitment.destroy',['id'=>2])}}" class="btn btn-outline-danger">Delete</a></div>--}}


                            <div class="pl-2"><a href="#" class="btn btn-success">Save</a></div>
                        </div>
                    </div>
                </div>
            </div>
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
            <div class="card card-primary">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <div class="item">
                            <h3>Work Experience</h3>
                        </div>
                        <div class="item">
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#createNewModal">Add new</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-brand">
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
                            <tbody>
                            <tr>
                                <td>Feel IT Services</td>
                                <td>Full Stack Developer</td>
                                <td>2018</td>
                                <td>2022</td>
                                <td>Yes</td>
                                <td class="cell-flex">
                                    <a href="#" class="table-link" data-toggle="modal" data-target="#editModal">
                                        <i class="cvd-edit"></i>
                                        Edit
                                    </a>
                                    <a href="#" class="table-link" data-table-collapse="#experianceRow1">
                                        <i class="cvd-arrow-right"></i>
                                        Open information
                                    </a>
                                    <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#confirmSkillsModal">
                                        <i class="cvd-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr class="row-hide" id="experianceRow1">
                                <td colspan="6" class="cell-description">
                                    Architecto maxime ex maxime possimus dicta. Incidunt dolorem blanditiis unde optio. Molestiae harum sequi voluptas in deleniti totam voluptas atque.
                                    <br>
                                    Nihil porro voluptatum dolores nulla. Necessitatibus ducimus repellat. Dolorum architecto et commodi nesciunt perferendis autem quam quis. Ducimus commodi officiis.
                                    <br>
                                    Ex consequatur accusamus. Quis earum molestiae laboriosam repudiandae aut nihil quo rerum laudantium. Accusamus dolorem enim beatae sint qui ullam et ut. Doloribus doloremque ut ipsa eum nam quod.
                                </td>
                            </tr>
                            <tr>
                                <td>Inther Software Group</td>
                                <td>Java Developer</td>
                                <td>2018</td>
                                <td>2022</td>
                                <td>Yes</td>
                                <td class="cell-flex">
                                    <a href="#" class="table-link" data-toggle="modal" data-target="#editModal">
                                        <i class="cvd-edit"></i>
                                        Edit
                                    </a>
                                    <a href="#" class="table-link" data-table-collapse="#experianceRow2">
                                        <i class="cvd-arrow-right"></i>
                                        Open information
                                    </a>
                                    <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#confirmSkillsModal">
                                        <i class="cvd-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr class="row-hide" id="experianceRow2">
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
                            <h3>Education</h3>
                        </div>
                        <div class="item">
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#createNewModal">Add new</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-brand">
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
                                        Edit
                                    </a>
                                    <a href="#" class="table-link" data-table-collapse="#educationRow1">
                                        <i class="cvd-arrow-right"></i>
                                        Open information
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
                                        Edit
                                    </a>
                                    <a href="#" class="table-link" data-table-collapse="#educationRow2">
                                        <i class="cvd-arrow-right"></i>
                                        Open information
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
                            <h3>Course or Training</h3>
                        </div>
                        <div class="item">
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#createNewModal">Add new</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-brand">
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
                                        Edit
                                    </a>
                                    <a href="#" class="table-link" data-table-collapse="#courseRow1">
                                        <i class="cvd-arrow-right"></i>
                                        Open information
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
                                    <h3>Skills</h3>
                                </div>
                                <div class="item">
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#createNewModal">Add new</a>
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
                                    <tbody>
                                    <tr>
                                        <td>PHP</td>
                                        <td>Professional</td>
                                        <td class="cell-flex">
                                            <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#confirmSkillsModal">
                                                <i class="cvd-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Java</td>
                                        <td>Beginner</td>
                                        <td class="cell-flex">
                                            <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#confirmSkillsModal">
                                                <i class="cvd-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>SQL</td>
                                        <td>Intermediate</td>
                                        <td class="cell-flex">
                                            <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#confirmSkillsModal">
                                                <i class="cvd-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>HTML &amp; CSS</td>
                                        <td>Expert</td>
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
                                    <h3>Characteristics</h3>
                                </div>
                                <div class="item">
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#createNewModal">Add new</a>
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
                                    <h3>Social Media</h3>
                                </div>
                                <div class="item">
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#createNewModal">Add new</a>
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
                                    <h3>Interests</h3>
                                </div>
                                <div class="item">
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#createNewModal">Add new</a>
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
        </div>
    </main>
@endsection