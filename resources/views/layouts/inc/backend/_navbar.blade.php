<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        @if (Request::is('admin/parametres/*') ||
                Request::is('admin/parametres/academie/*') ||
                Request::is('register') ||
                Request::is('admin/parametres/personnel/*') ||
                Request::is('admin/parametres/option/*') ||
                Request::is('admin/parametres/cycle/*') ||
                Request::is('admin/parametres/annee-scolaire/*'))
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('admin.parametres.ecole.index') }}" class="nav-link">Ecole</a>
            </li>

            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('admin.parametres.academie.index') }}" class="nav-link">Academie</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('admin.parametres.option.index') }}" class="nav-link">Option</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('admin.parametres.cycle.index') }}" class="nav-link">Cycle</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('admin.parametres.annee-scolaire.index') }}" class="nav-link">Année Scolaire</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('admin.parametres.personnel.index') }}" class="nav-link">Personnel</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('admin.parametres.roleEtPermission.liste') }}" class="nav-link">Role & Permission</a>
            </li>
        @endif

    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                <i class="fas fa-expand-arrows-alt"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                {{-- <i class="fas fa-th-large"></i> --}}
                <i class="fa-regular fa-gear"></i>
            </a>
        </li>
    </ul>
</nav>
