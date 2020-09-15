
<li class="nav-item"><a class="nav-link" href="{{ url('/actu') }}">Actualités</a></li>
<li class="nav-item"><a class="nav-link" href="{{ url('/sorties') }}">Sorties</a></li>
<li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>
@if(Auth::check() && Auth::User()->verifie === 1)<li class="nav-item"><a class="nav-link" href="{{ url('/menbres') }}">Menbres</a></li>@endif
<li class="nav-item"><a class="nav-link" href="{{ url('/reglement') }}">Règlement</a></li>
<li class="nav-item"><a class="nav-link" href="{{ url('/partenaires') }}">Nos partenaires</a></li>
<li class="nav-item"><a class="nav-link" href="{{ url('/apropos') }}">A propos de nous</a></li>
@if(Auth::check() && Auth::User()->admin === 1)<li class="nav-item"><a class="nav-link" href="{{ url('/ajoutActu') }}">Publier une actualité</a></li>@endif
@if(Auth::check() && Auth::User()->admin === 1)<li class="nav-item"><a class="nav-link" href="{{ url('/ajoutSortie') }}">Ajouter une sortie</a></li>@endif
