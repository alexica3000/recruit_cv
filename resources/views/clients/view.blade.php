@extends('layouts.app')


@section('title', 'Clients')


@section('buttons')
    <a href="{{ route('clients.create') }}" class="btn btn-primary">New client</a>
@endsection


@section('content')

            <div class="table-responsive">
                <table class="table table-brand">
                    <thead>
                        <tr>
                            <th>Client</th>
                            <th>Department</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clients as $client)
                            <tr>
                                <td>{{ $client->name }}</td>
                                <td>{{ $client->department->name }}</td>
                                <td class="cell-flex">
                                    <a href="{{route('clients.edit', $client->id)}}" class="table-link">
                                        <i class="cvd-eye"></i>
                                        View information
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

@endsection