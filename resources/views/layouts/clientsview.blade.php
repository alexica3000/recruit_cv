@extends('layouts.app')

@section('content')
    <main class="main">
        <div class="container">
            <div class="page-head">
                <div class="d-flex justify-content-between flex-wrap">
                    <div class="item">
                        <h3>Clients</h3>
                    </div>
                    <div class="item">
                        <a href="{{route('clients.create')}}" class="btn btn-primary">New client</a>
                    </div>
                </div>
            </div>
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
                    <tr>
                        <td>Ten Brinke</td>
                        <td>Best4u</td>
                        <td class="cell-flex">
                            <a href="{{route('clients.edit', ['id'=>2])}}" class="table-link">
                                <i class="cvd-eye"></i>
                                View information
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Company B</td>
                        <td>VCI</td>
                        <td class="cell-flex">
                            <a href="{{route('clients.edit', ['id'=>2])}}" class="table-link">
                                <i class="cvd-eye"></i>
                                View information
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Company C</td>
                        <td>Best4u</td>
                        <td class="cell-flex">
                            <a href="{{route('clients.edit', ['id'=>2])}}" class="table-link">
                                <i class="cvd-eye"></i>
                                View information
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Company D</td>
                        <td>Best4u</td>
                        <td class="cell-flex">
                            <a href="{{route('clients.edit', ['id'=>2])}}" class="table-link">
                                <i class="cvd-eye"></i>
                                View information
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Company E</td>
                        <td>VCI</td>
                        <td class="cell-flex">
                            <a href="{{route('clients.edit', ['id'=>2])}}" class="table-link">
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