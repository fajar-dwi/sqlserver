<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('boostrap/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('boostrap/css/simple-sidebar.css') }}" rel="stylesheet">

</head>

<body>

<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">Start Bootstrap </div>
        <div class="list-group list-group-flush">
            <a href="/" class="list-group-item list-group-item-action bg-light
            {{ Request::is('/') ? 'active' : '' }}">Dashboard</a>
            <a href="#" class="list-group-item list-group-item-action bg-light
            {{ Request::is('profile') ? 'active' : '' }}">Profile</a>
            @role('admin')
            <a href="manage-user" class="list-group-item list-group-item-action bg-light
            {{ Request::is('manage-user') ? 'active' : '' }}">Data User</a>
            <a href="manage-buku" class="list-group-item list-group-item-action bg-light
            {{ Request::is('manage-buku') ? 'active' : '' }}">Manage Buku</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Data Pinjam</a>
            @endrole
            <a href="#" class="list-group-item list-group-item-action bg-light">Data Buku</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>
        </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <button class="btn btn-info" id="menu-toggle">Toggle Menu</button>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/profil">Profile</a>
                            <a class="dropdown-item" href="{{ route('password.request') }}">Ganti Password</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>

        @yield('content')
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('boostrap/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('boostrap/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script defer src="{{ asset('fontawesome/js/all.js') }}"></script>

<!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

</body>

</html>
