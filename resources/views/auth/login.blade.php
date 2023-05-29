<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mali Ecole | Se connecter</title>

    @vite(['resources/sass/backend.scss', 'resources/js/backend.js'])
</head>

<body class="hold-transition login-page">
    <div class="login-box">

        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ route('accueil') }}" class="h1">Mali Ecole</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Remplir ces champs pour se connecter</p>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                {{-- <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}> --}}
                                <label for="remember">
                                    Se souvenir de moi
                                </label>
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">
                                Sec connecter
                            </button>
                        </div>

                    </div>
                </form>

                <p class="mb-1 mt-3">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            Mot de passe oublié
                        </a>
                    @endif
                </p>
                <p class="mb-0">
                    <a href="{{ route('register') }}" class="text-center">Enregistrer un nouveau personnel</a>
                </p>
            </div>

        </div>

    </div>

</html>
