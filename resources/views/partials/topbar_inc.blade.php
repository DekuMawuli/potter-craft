<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">P.C</a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
            aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.users') }}">Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.documents') }}">Documents</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.depots') }}">Depots</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">{{ \Illuminate\Support\Facades\Auth::user()->name ?? 'New Admin' }}</a>
                <div class="dropdown-menu" aria-labelledby="dropdownId">
                    <a class="dropdown-item" href="#">Profile</a>
                    <form action="{{ route('admin.logout') }}" method="POST" class="dropdown-item">
                        @csrf
                        <button type="submit" class="btn">Logout</button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
    </div>
</nav>
