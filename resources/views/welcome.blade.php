<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{url('/home') }}">Home</a>
                        <a href="{{url('/gestionProfil')}}">Gestion du profil</a>
                    @else
                        <a href="{{ route('login') }}">Se connecter</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">S'enregistrer</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <img style="height: auto; width: 100%;"  src="../img/divers/acceuil.jpg">
                </div>

                <div class="links">
                    <a href="{{route('actu')}}">Actualités</a>
                    <a class="nav-link" href="{{ url('/sorties') }}">Sorties</a>
                    <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
                    @if(Auth::check() && Auth::User()->verifie === 1)<a class="nav-link" href="{{ url('/menbres') }}">Menbres</a>@endif
                    <a class="nav-link" href="{{ url('/reglement') }}">Règlement</a>
                    <a class="nav-link" href="{{ url('/partenaires') }}">Nos partenaires</a>
                    <a class="nav-link" href="{{ url('/apropos') }}">A propos de nous</a>
                    @if(Auth::check() && Auth::User()->admin === 1)<a class="nav-link" href="{{ url('/ajoutActu') }}">Publier une actualité</a>@endif
                </div>
            </div>
        </div>
    </body>
</html>


