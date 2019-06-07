<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{{url('images/favicon.png')}}" type="image/gif">

    <title>@yield('title')</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content={{ csrf_token() }}>

    <!-- Styles -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>
<body>

<div class="site-loader" id="site-loader">
     <div class="spinner-border spinner-border-lg text-primary" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>


<div id="app" class="site-wrapper">
    <header class="header header-brand">
        @include('layouts.navbar')
    </header>

    <main class="main">
        <div class="container">
                @include('layouts.header')
                @include('layouts.errors')
                @include('layouts.message')
                @yield('content')
        </div>
    </main>

</div>
<!-- JavaScripts -->
<script src="{{asset('js/app.js')}}"></script>
</body></html>
