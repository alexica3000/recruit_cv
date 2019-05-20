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
                    <li class="{{Request::is('recruitment') ? 'nav-item active' : 'nav-item' }}">
                        <a class="nav-link" href="{{ route('recruitment.index') }}">Recruitment</a>
                    </li>
                    <li class="{{Request::is('accounts') ? 'nav-item active' : 'nav-item'}}">
                        <a class="nav-link" href="{{ route('accounts.index') }}">Accounts</a>
                    </li>
                    <li class="{{Request::is('departments') ? 'nav-item active' : 'nav-item'}}">
                        <a class="nav-link" href="{{route('departments.index')}}">Departments</a>
                    </li>
                    <li class="{{Request::is('clients') ? 'nav-item active' : 'nav-item'}}">
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
