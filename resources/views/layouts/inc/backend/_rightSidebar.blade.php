<aside class="control-sidebar control-sidebar-dark">
    <div class="p-3">
        {{-- Deconnexion --}}
        <div>
            <a href="{{ route('logout') }}" class="nav-link bg-danger"
                onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                <i class="nav-icon fa-solid fa-right-from-bracket"></i>
                <span>
                    Déconnexion
                </span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</aside>
