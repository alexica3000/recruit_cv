@extends('layouts.app')

@section('title', 'Departments')

@section('buttons')
    <a href="{{ route('departments.create') }}" class="btn btn-primary">New department</a>
@endsection

@section('content')

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

@endsection