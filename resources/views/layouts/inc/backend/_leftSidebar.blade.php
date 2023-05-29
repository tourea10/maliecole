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


            </ul>
        </nav>

    </div>

</aside>
