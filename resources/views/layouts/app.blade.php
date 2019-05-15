<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{{url('images/favicon.png')}}" type="image/gif">

    <title>CV Database</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="E0nMLAbx7nG8r7t0GRvmvyk5WCuHUT4nWWLungPl">

    <!-- Styles -->
    <link href="{{url('css/app.css')}}" rel="stylesheet">
</head>
<body>
<!--
<div class="site-loader" id="site-loader">
     <div class="spinner-border spinner-border-lg text-primary" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
-->

<div id="app" class="site-wrapper">
    <header class="header header-brand">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand brand-logo" href="/">
                    <img src="{{url('images/cv_database.png')}}" alt="CV Database">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarHeader">
                    <ul class="navbar-nav ml-auto navbar-caliber">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('recruitment.index') }}">Recruitment</a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('accounts.index') }}">Accounts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('departments.index')}}">Departments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('clients.index')}}">Clients</a>
                        </li>
                    </ul>
                    <div class="form-inline">
                        <div class="btn-toolbar">
                            <div class="btn-group mr-2">
                                <a class="btn btn-default btn-md" href="{{route('myaccount')}}" data-toggle="tooltip" data-placement="top" title="Settings">
                                    <i class="cvd-user"></i>
                                </a>
                            </div>
                            <div class="btn-group">
                                <a class="btn btn-danger btn-md" data-toggle="tooltip" data-placement="top" title="Exit" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    <i class="cvd-logout"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    @yield('content')
</div>
<!-- Modals -->
<!-- JavaScripts -->
<script src="{{url('js/app.js')}}"></script>
</body></html>