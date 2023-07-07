<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="{{ route('accueil') }}" class="brand-link">
        <span class="brand-link h3 fw-bold text-center">Mali Ecole</span>
    </a>

    <div class="sidebar">


        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                {{-- Tableau de Bord --}}
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link @if (Request::is('page-administration')) active @endif">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Tableau de Bord</p>
                    </a>
                </li>

                {{-- Maire de la mairie --}}
                <li class="nav-item @if (Request::is('filiere/*') || Request::is('filiere')) menu-open @endif">
                    <a href="#" class="nav-link @if (Request::is('filiere/*') || Request::is('filiere')) active @endif">
                        <i class="nav-icon fa-solid fa-users"></i>
                        <p>
                            Filiere
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('filiere.create') }}"
                                class="nav-link @if (Request::is('filiere/create')) active @endif">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Ajouter</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('filiere.index') }}"
                                class="nav-link @if (Request::is('filiere')) active @endif">
                                <i class="fa-solid fa-list-ol nav-icon"></i>
                                <p>Les filieres</p>
                            </a>
                        </li>
                    </ul>
                </li>


            </ul>
        </nav>

    </div>

</aside>
