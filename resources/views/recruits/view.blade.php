@extends('layouts.app')

@section('title', 'Recruitment')

@section('buttons')
    <a href="{{ route('recruits.create') }}" class="btn btn-primary">New recruit</a>
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

                @foreach($recruits as $recruit)
                    <tr>
                        <td>{{ $recruit->name }}</td>
                        <td>{{ $recruit->job }}</td>
                        <td>{{ $recruit->created_at->format('d / m / Y') }}</td>
                        <td class="cell-flex">
                            <a href="{{ route('recruits.edit', $recruit->id) }}" class="table-link">
                                <i class="cvd-eye"></i>
                                View information
                            </a>
                        </td>
                    </tr>
                @endforeach

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
                    <div class="item result"><strong>{{ $recruits->total() }}</strong> Results</div>
                </div>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><strong>Page</strong></li>
                        {{ $recruits->links() }}
                </ul>
            </nav>
        </div>
    </div>

@endsection