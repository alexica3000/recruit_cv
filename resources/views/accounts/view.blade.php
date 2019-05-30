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

                        @foreach($accounts as $account)
                            <tr>
                                <td>{{ $account->name}}</td>
                                <td class="cell-flex">
                                    <a href="{{route('accounts.edit', ['id'=>$account->id])}}" class="table-link">
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
                                <a href="?item=5">5</a>
                            </div>

                            <div class="item">
                                <a href="?item=10">10</a>
                            </div>
                            <div class="item">
                                <a href="?item=15">15</a>
                            </div>
                            <div class="item">
                                <a href="?item=20">20</a>
                            </div>
                            <div class="item">
                                <a href="?item=all">Show all</a>
                            </div>
                            <div class="item result"><strong>{{ $accounts->total() }}</strong> Results</div>
                        </div>
                    </div>

                    @if($accounts->total() > $item)
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item"><strong>Page</strong></li>
                                {{ $accounts->links() }}
                            </ul>
                        </nav>

                    @endif

                </div>
            </div>

@endsection
