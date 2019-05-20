@extends('layouts.app')

@section('title', 'Accounts')

@section('buttons')
    <a href="{{ route('accounts.create') }}" class="btn btn-primary">New account</a>
@endsection


@section('content')

            <div class="table-responsive">
                <table class="table table-brand">
                    <thead>
                    <tr>
                        <th>Account</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Emmo Elshof</td>
                        <td class="cell-flex">
                            <a href="{{route('accounts.edit', ['id'=>2])}}" class="table-link">
                                <i class="cvd-eye"></i>
                                View information
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Veronica Covali</td>
                        <td class="cell-flex">
                            <a href="{{route('accounts.edit', ['id'=>2])}}" class="table-link">
                                <i class="cvd-eye"></i>
                                View information
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Mihaela Negru</td>
                        <td class="cell-flex">
                            <a href="{{route('accounts.edit', ['id'=>2])}}" class="table-link">
                                <i class="cvd-eye"></i>
                                View information
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Nicolae Tabaran</td>
                        <td class="cell-flex">
                            <a href="{{route('accounts.edit', ['id'=>2])}}" class="table-link">
                                <i class="cvd-eye"></i>
                                View information
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Serghei Covali</td>
                        <td class="cell-flex">
                            <a href="{{route('accounts.edit', ['id'=>2])}}" class="table-link">
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
