@extends('layouts.app')

@section('content')
    {{--//european time--}}
    <?php setlocale(LC_TIME, 'fr_FR.utf8', 'fra');?>
    <div class="container-fluid">

        @foreach($menbres as $menbre)
            @if(($menbre->name_v && $menbre->telephone_v) || (Auth::check() && Auth::User()->admin === 1))
                <div class="row">
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4" style="border-color: black; border-style: inset">
                        <div class="row">
                            {{--    //touver la bonne div pour centrer le contenu--}}
                            <div class="col-md-6">
                                <br>
                                {{--                            for every attribut we check if it visible or if the connected is admin--}}
                                @if($menbre->name_v || (Auth::check() && Auth::User()->admin === 1))
                                    <h2>{{$menbre->name}}</h2>@endif

                                <h4>Enregistré le {{strftime("%A %d %B", strtotime($menbre->created_at))}}</h4><br>

                                @if($menbre->email_v || (Auth::check() && Auth::User()->admin === 1))
                                    <p>{{$menbre->email}}<br></p>@endif
                                @if($menbre->adresse_v || (Auth::check() && Auth::User()->admin === 1))
                                    <p>{{$menbre->adresse}}</p>
                                    <p>{{$menbre->code_postal}} {{$menbre->ville}}</p>
                                @endif
                                @if($menbre->telephone_v || (Auth::check() && Auth::User()->admin === 1))
                                    <p>{{$menbre->telephone}}<br></p>@endif
                                @if($menbre->date_de_naissance_v || (Auth::check() && Auth::User()->admin === 1))<p>Né
                                    le {{strftime("%A %d %B %Y", strtotime($menbre->date_de_naissance))}}<br></p>@endif
                                @if(Auth::check() && Auth::User()->admin === 1)<p>Le numéro d'identifiant du menbre est
                                    : {{$menbre->id}}</p>@endif
                                @if(Auth::check() && Auth::User()->admin === 1)<p>La ville natale du menbre est
                                    : {{$menbre->ville_natale}}</p>@endif
                            </div>
                            @if($menbre->photo_v || (Auth::check() && Auth::User()->admin === 1))
                                <div class="col-md-6">
                                    <img src="../img/user/{{$menbre->chemin_photo}}"
                                         style="height:auto; width:100%; margin: 1em auto">
                                    <p>Menbre du club {{$menbre->categorie}}</p>
                                </div>
                            @endif
                        </div>
                        @if((Auth::check() && Auth::User()->admin === 1))
                            <div class="row">
                                <div class="col-md-4">
                                </div>
                                <div class="btn-group btn-group-lg mb-4" role="group" aria-label="Basic example"
                                     style="margin: 1em auto">
                                    @if($menbre->verifie === 1 && $menbre->admin === 0)
                                        <form method="POST" action="{{ route('menbres') }}"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <input id="id" type="hidden" class="form-control" name="id"
                                                   value="{{$menbre->id}}" autofocus>
                                            <button class="btn btn-warning" type="submit" name="desaccepter"
                                                    onclick="return confirm('Etes vous sûr ?')" class="btn btn-primary">
                                                {{ __('Désaccepter') }}
                                            </button>
                                        </form>
                                    @elseif($menbre->verifie === 0)
                                        <form method="POST" action="{{ route('menbres') }}"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <input id="id" type="hidden" class="form-control" name="id"
                                                   value="{{$menbre->id}}" autofocus>
                                            <button class="btn btn-warning" type="submit" name="accepter"
                                                    onclick="return confirm('Etes vous sûr ?')" class="btn btn-primary">
                                                {{ __('Accepter') }}
                                            </button>
                                        </form>
                                    @endif
                                    <form method="POST" action="{{ route('menbres') }}" enctype="multipart/form-data">
                                        @csrf
                                        <input id="id" type="hidden" class="form-control" name="id"
                                               value="{{$menbre->id}}" autofocus>
                                        <button class="btn  btn-danger" type="submit" name="supprimer"
                                                onclick="return confirm('Etes vous sûr ? Le profil du menbre sera définitivement perdu.')"
                                                class="btn btn-primary">
                                            {{ __('Supprimer') }}
                                        </button>
                                    </form>
                                        @if($menbre->admin === 1)
                                            <form method="POST" action="{{ route('menbres') }}"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <input id="id" type="hidden" class="form-control" name="id"
                                                       value="{{$menbre->id}}" autofocus>
                                                <button class="btn btn-danger" type="submit" name="desadmin"
                                                        onclick="return confirm('Etes vous sûr ?')" class="btn btn-primary">
                                                    {{ __('Retirer admin') }}
                                                </button>
                                            </form>
                                        @elseif($menbre->verifie === 1)
                                            <form method="POST" action="{{ route('menbres') }}"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <input id="id" type="hidden" class="form-control" name="id"
                                                       value="{{$menbre->id}}" autofocus>
                                                <button class="btn btn-danger" type="submit" name="admin"
                                                        onclick="return confirm('Etes vous sûr ?')" class="btn btn-primary">
                                                    {{ __('Mettre admin') }}
                                                </button>
                                            </form>
                                        @endif
                                </div>
                                @endif
                            </div>
                    </div>
                </div>
                <hr>

                <br><br>
    </div>
    @endif
    @endforeach
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
            <div class="col-12 mt-5 text-center">
                <span>{{$menbres->links()}}</span>
            </div>
        </div>
    </div>
    </div>
@endsection
