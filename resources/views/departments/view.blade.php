@extends('layouts.app')

@section('content')
    <main class="main">
        <div class="container">
            <div class="page-head">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="item">
                        <h3>Departments</h3>
                    </div>
                    <div class="item">
                        <a href="{{route('departments.create')}}" class="btn btn-primary">New department</a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-brand">
                    <thead>
                    <tr>
                        <th>Department</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Best4u</td>
                        <td class="cell-flex">
                            <a href="{{route('departments.edit', ['id'=>2])}}" class="table-link">
                                <i class="cvd-eye"></i>
                                View information
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>VCI</td>
                        <td class="cell-flex">
                            <a href="{{route('departments.edit', ['id'=>2])}}" class="table-link">
                                <i class="cvd-eye"></i>
                                View information
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection