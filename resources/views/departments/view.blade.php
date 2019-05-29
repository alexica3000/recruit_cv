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
                    <tbodyzz>

                    @foreach($departments as $department)

                        <tr>
                            <td>{{ $department->name }}</td>
                            <td class="cell-flex">
                                <a href="{{route('departments.edit', $department->id)}}" class="table-link">
                                    <i class="cvd-eye"></i>
                                    View information
                                </a>
                            </td>
                        </tr>

                    @endforeach

                    </tbodyzz>
                </table>
            </div>

@endsection