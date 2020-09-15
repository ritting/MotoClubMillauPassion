@extends('layouts.app')

@section('content')
    {{--//european time--}}
    <?php setlocale(LC_TIME, 'fr_FR.utf8', 'fra');?>
    <div class="text-center" class="align-items-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="content-center">
                        <h1>{{$sortie->titre}}</h1>
                        <h4>{{$sortie->jour}}</h4>
                        <h4>{{$sortie->lieu}}</h4>
                    </div>

                    <div align=Justify>
                        <?php echo str_replace('<br />', '<br/>', nl2br($sortie->description)) ?>
                    </div>
                    <br>
                </div>
                <div class="col-lg-3"></div>
            </div>
            <br>
            {{--            see photos // admin have a distinct part for give him the possibility of delete each picture--}}
            @if(Auth::check() && Auth::User()->admin === 1)
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <H1>Benévoles :</H1>
                        @foreach($benevole as $ben)
                            <p>Nom : {{$ben->name}}</p>
                            <p>Téléphone : {{$ben->telephone}}</p>
                            <p>Mail : {{$ben->email}}</p>
                            <br><hr>
                        @endforeach
                        <br><hr>
                        <H1>Participants :</H1>
                        @foreach($participant as $par)
                            <p>Nom : {{$par->name}}</p>
                            <p>Téléphone : {{$par->telephone}}</p>
                            <p>Mail : {{$par->email}}</p>
                            <br><hr>
                        @endforeach
                    </div>
                    <div class="col-lg-3"></div>
                </div>
                @foreach($photos as $photo)
                    <img src="/img/sorties/{{$photo->chemin_photo}}"
                         style="height:auto; width:100%; margin: 1em auto">
                    <form method="POST" action="{{ route('sortiedetails') }}" enctype="multipart/form-data">
                        @csrf
                        <input id="id" type="hidden" class="form-control" name="id"
                               value="{{$photo->id}}" autofocus>
                        <input id="id" type="hidden" class="form-control" name="id_sortie"
                               value="{{$photo->id_sorties}}" autofocus>
                        <button class="btn btn-danger" type="submit" name="supprimer"
                                value="modifier"
                                onclick="return confirm('Etes vous sûr ?')" class="btn btn-primary">
                            {{ __('Supprimer photo') }}
                        </button>
                    </form>
                @endforeach
            @else
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        <div id="carousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <?php $nb = 0; ?>
                                @foreach($photos as $photo)
                                    <li data-target=".carousel" data-slide-to="{{$nb}}"
                                        class=" @if($nb === 0)active @endif"></li>
                                    <?php $nb++; ?>
                                @endforeach
                            </ol>
                            <div class="carousel-inner">
                                <?php $nb1 = 0; ?>
                                @foreach($photos as $photo)
                                    <div class="carousel-item @if($nb1 === 0)active @endif">
                                        <img class="d-block w-100" src="/img/sorties/{{$photo->chemin_photo}}"
                                             style="height:auto; width:100%; margin: 1em auto">
                                        <div class="carousel-caption">
                                        </div>
                                    </div>
                                    <?php $nb1++; ?>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carousel" data-slide="prev">
                                {{--                            <span class="carousel-control-prev-icon"></span>--}}
                                <span class="carousel-control-prev-icon" style="background-color: black;"></span>
                            </a>
                            <a class="carousel-control-next" href="#carousel" data-slide="next">
                                <span class="carousel-control-next-icon" style="background-color: black"></span>
                            </a>
                        </div>

                    </div>
                    <div class="col-lg-3"></div>
                </div>
            @endif
            @if(Auth::check() && Auth::User()->verifie === 1 && Auth::User()->admin === 0)
                <div class="btn-group btn-group-lg mb-4" role="group" aria-label="Basic example">

                    <form method="POST" action="{{ route('sortiegestion') }}"
                          enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" class="form-control" name="sorties_id"
                               value="{{$sortie->id}}" required autocomplete="chemin_photo"
                               autofocus>
                        <input type="hidden" class="form-control" name="user_id"
                               value="{{ Auth::user()->id}}" required autocomplete="chemin_photo"
                               autofocus>
                        {{--                        @if(empty($benevoles->user_id))--}}
                        @if(isset($benevole) && Auth::user()->id === $benevole->user_id)
                            <button class="btn btn-warning" type="submit" name="benevole_out"
                                    value="benevole_out"
                                    onclick="return confirm('Etes vous sûr ?')" class="btn btn-primary">
                                {{ __('Retirer volontariat') }}
                            </button>
                        @else
                            <button class="btn btn-warning" type="submit" name="benevole_in"
                                    value="benevole_in"
                                    onclick="return confirm('Etes vous sûr ?')" class="btn btn-primary">
                                {{ __('Se porter volontaire') }}
                            </button>
                        @endif
                    </form>

                    <form method="POST" action="{{ route('sortiegestion') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" class="form-control" name="sorties_id"
                               value="{{$sortie->id}}" required autocomplete="chemin_photo"
                               autofocus>
                        <input type="hidden" class="form-control" name="user_id"
                               value="{{ Auth::user()->id}}" required autocomplete="chemin_photo"
                               autofocus>
                        @if(isset($participant) && Auth::user()->id === $participant->user_id)
                            <button class="btn btn-warning" type="submit" name="participation_out"
                                    value="participation_out"
                                    onclick="return confirm('Etes vous sûr ?')" class="btn btn-primary">
                                {{ __('Annuler sa présence') }}
                            </button>
                        @else
                            <button class="btn btn-warning" type="submit" name="participation_in"
                                    value="participation_in"
                                    onclick="return confirm('Etes vous sûr ?')" class="btn btn-primary">
                                {{ __('Confirmer sa présence') }}
                            </button>
                        @endif
                    </form>
                </div>
            @endif
        </div>
    </div>
@endsection
