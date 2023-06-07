<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titre_Page') | Administration</title>

    @vite(['resources/sass/backend.scss', 'resources/js/backend.js'])

    {{-- ajout d'autre Css : Optionnel --}}
    @yield('autreCss')

    @livewireStyles()

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        {{-- Insertion du navbar --}}
        @include('layouts.inc.backend._navbar')
        {{-- Insertion du leftSidebar --}}
        @include('layouts.inc.backend._leftSidebar')


        <div class="content-wrapper">

            {{-- Titre interne de la page --}}
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6 col-md-12">
                            <h1 class="m-0 text-center">

                                @yield('titre_Contenu')

                            </h1>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Body de la page admin --}}
            <div class="content">
                <div class="container-fluid">

                    @yield('Contenu')

                </div>
            </div>

        </div>


        {{-- Insertion du leftSidebar --}}
        @include('layouts.inc.backend._rightSidebar')

        {{-- Insertion du footer --}}
        @include('layouts.inc.backend._footer')
    </div>
    @yield('autresJs')
    @livewireScripts()
</body>

</html>
