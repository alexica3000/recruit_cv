@extends('layouts.app')

@section('title', 'Recruitment')

@section('buttons')
    <a href="{{ route('recruitment.create') }}" class="btn btn-primary">New recruit</a>
@endsection


@section('content')

    <div class="page-filter">
        <form action="#" method="POST">
            <div class="row mx-n2">
                <div class="col-12 col-xl-2 col-lg-3 col-md-6 px-2">
                    <div class="form-group">
                        <input type="text" name="filter_name" class="form-control" placeholder="Name">
                    </div>
                </div>
                <div class="col-12 col-xl-2 col-lg-3 col-md-6 px-2">
                    <div class="form-group">
                        <input type="text" name="filter_job" class="form-control" placeholder="Job">
                    </div>
                </div>
                <div class="col-12 col-xl-2 col-lg-3 col-md-6 px-2">
                    <div class="form-group">
                        <div class="input-group datetimepicker-default" id="filter_added_after" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" name="filter_added_after" placeholder="Added after" data-target="#filter_added_after">
                            <div class="input-group-append" data-target="#filter_added_after" data-toggle="datetimepicker">
                                <div class="input-group-text">
                                    <i class="cvd-calendar"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-2 col-lg-3 col-md-6 px-2">
                    <div class="form-group">
                        <select name="filter_skill" id="filter_skill" class="form-control select2-init" data-placeholder="Skill">
                            <option></option>
                            <option value="1">Skill A</option>
                            <option value="2">Skill B</option>
                        </select>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-brand">
            <thead>
            <tr>
                <th>Name</th>
                <th>Job</th>
                <th>Added</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Ghenadie Utuh</td>
                <td>Full Stack Java Developer</td>
                <td>07 / FEB / 2019</td>
                <td class="cell-flex">
                    <a href="{{ route('recruitment.edit', ['id' => 2]) }}" class="table-link">
                        <i class="cvd-eye"></i>
                        View information
                    </a>
                </td>
            </tr>
            <tr>
                <td>Matei Donici</td>
                <td>Graphical Designer</td>
                <td>05 / FEB / 2019</td>
                <td class="cell-flex">
                    <a href="{{ route('recruitment.edit', ['id' => 2]) }}" class="table-link">
                        <i class="cvd-eye"></i>
                        View information
                    </a>
                </td>
            </tr>
            <tr>
                <td>Vera Osoianu</td>
                <td>Scrum Master</td>
                <td>30 / JAN / 2019</td>
                <td class="cell-flex">
                    <a href="{{ route('recruitment.edit', ['id' => 2]) }}" class="table-link">
                        <i class="cvd-eye"></i>
                        View information
                    </a>
                </td>
            </tr>
            <tr>
                <td>Alecu Russo</td>
                <td>Automated Tester</td>
                <td>21 / JAN / 2019</td>
                <td class="cell-flex">
                    <a href="{{ route('recruitment.edit', ['id' => 2]) }}" class="table-link">
                        <i class="cvd-eye"></i>
                        View information
                    </a>
                </td>
            </tr>
            <tr>
                <td>Oleg Serebrian</td>
                <td>System Administrator</td>
                <td>20 / JAN / 2019</td>
                <td class="cell-flex">
                    <a href="{{ route('recruitment.edit', ['id' => 2]) }}" class="table-link">
                        <i class="cvd-eye"></i>
                        View information
                    </a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="pagination-bar">
        <div class="d-lg-flex justify-content-between">
            <div class="per-page">
                <div class="d-flex">
                    <div class="item">Results per page</div>
                    <div class="item">
                        <a href="#">5</a>
                    </div>
                    <div class="item">
                        <a href="#">10</a>
                    </div>
                    <div class="item">
                        <a href="#">15</a>
                    </div>
                    <div class="item">
                        <a href="#">20</a>
                    </div>
                    <div class="item">
                        <a href="#">Show all</a>
                    </div>
                    <div class="item result"><strong>937</strong> Results</div>
                </div>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><strong>Page</strong></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                </ul>
            </nav>
        </div>
    </div>

@endsection