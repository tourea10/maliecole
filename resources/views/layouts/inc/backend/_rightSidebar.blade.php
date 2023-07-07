<aside class="control-sidebar control-sidebar-dark">
    <div class="p-3">

        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                @if (Auth::user()->detailsPersonnel->photo)
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                            src="{{ url('storage/personnel/' . Auth::user()->detailsPersonnel->photo) }}"
                            alt="User profile picture">
                    </div>
                @else
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"
                            src="{{ url('storage/images/base/profile-default.jpg') }}" alt="User profile picture">
                    </div>
                @endif
                <h3 class="profile-username text-center text-black">Aboubacar TOURE</h3>
                <h6 class="text-black">Roles & Permissions :</h6>
                <ul>
                    @foreach (Auth::user()->getRoleNames() as $utilisateurRoles)
                        <li>{{ $utilisateurRoles }}</li>
                    @endforeach
                    @foreach (Auth::user()->getPermissionNames() as $utilisateurPermissions)
                        <li>{{ $utilisateurPermissions }}</li>
                    @endforeach
                </ul>
                <a href="{{ route('admin.parametres.index') }}" class="btn btn-primary btn-block"><b>Paramètres</b></a>
            </div>

        </div>

        {{-- Deconnexion --}}
        <div>
            <a href="{{ route('logout') }}" class="btn btn-block btn-danger"
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
