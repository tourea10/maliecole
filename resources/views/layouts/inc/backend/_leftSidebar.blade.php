<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="{{ route('accueil') }}" class="brand-link">
        <span class="brand-link h3 fw-bold text-center">Mali Ecole</span>
    </a>

    <div class="sidebar">


        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                {{-- Tableau de Bord --}}
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link @if (Request::is('home')) active @endif">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Tableau de Bord</p>
                    </a>
                </li>

                {{-- Filière --}}
                <li class="nav-item @if (Request::is('filiere/*') || Request::is('filiere')) menu-open @endif">
                    <a href="#" class="nav-link @if (Request::is('filiere/*') || Request::is('filiere')) active @endif">
                        <i class="nav-icon fa-solid fa-users"></i>
                        <p>
                            Filière
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

                {{-- Discipline --}}
                <li class="nav-item @if (Request::is('discipline/*') || Request::is('discipline')) menu-open @endif">
                    <a href="#" class="nav-link @if (Request::is('discipline/*') || Request::is('discipline')) active @endif">
                        <i class="nav-icon fa-solid fa-users"></i>
                        <p>
                            Discipline
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('discipline.create') }}"
                                class="nav-link @if (Request::is('discipline/create')) active @endif">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Ajouter</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('discipline.index') }}"
                                class="nav-link @if (Request::is('discipline')) active @endif">
                                <i class="fa-solid fa-list-ol nav-icon"></i>
                                <p>Les Disciplines</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Classe --}}
                <li class="nav-item @if (Request::is('classe/*') || Request::is('classe')) menu-open @endif">
                    <a href="#" class="nav-link @if (Request::is('classe/*') || Request::is('classe')) active @endif">
                        <i class="nav-icon fa-solid fa-users"></i>
                        <p>
                            Classe
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('classe.create') }}"
                                class="nav-link @if (Request::is('classe/create')) active @endif">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Ajouter</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('classe.index') }}"
                                class="nav-link @if (Request::is('classe')) active @endif">
                                <i class="fa-solid fa-list-ol nav-icon"></i>
                                <p>Les classes</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Matiere --}}
                <li class="nav-item @if (Request::is('matiere/*') || Request::is('matiere')) menu-open @endif">
                    <a href="#" class="nav-link @if (Request::is('matiere/*') || Request::is('matiere')) active @endif">
                        <i class="nav-icon fa-solid fa-users"></i>
                        <p>
                            Matiere
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('matiere.create') }}"
                                class="nav-link @if (Request::is('matiere/create')) active @endif">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Ajouter</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('matiere.index') }}"
                                class="nav-link @if (Request::is('matiere')) active @endif">
                                <i class="fa-solid fa-list-ol nav-icon"></i>
                                <p>Les matieres</p>
                            </a>
                        </li>
                    </ul>
                </li>


            </ul>
        </nav>

    </div>

</aside>
