<aside class="control-sidebar control-sidebar-dark">
    <div class="p-3">

        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                        src="{{ url('storage/images/base/profile-default.jpg') }}" alt="User profile picture">
                </div>
                <h3 class="profile-username text-center text-black">Aboubacar TOURE</h3>
                <p class="text-muted text-center">
                    Software Engineer
                    <br>Poste
                </p>
                <h4 class="text-black">Roles :</h4>
                <ul>
                    <li>Admin</li>
                    <li>Secretaire</li>
                    <li>Informaticien</li>
                </ul>
                <a href="{{ route('admin.lesAcademies') }}" class="btn btn-primary btn-block"><b>Paramètres</b></a>
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
