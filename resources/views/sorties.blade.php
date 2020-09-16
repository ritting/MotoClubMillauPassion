@extends('layouts.app')

@section('content')

    {{--//european time--}}
    <?php setlocale(LC_TIME, 'fr_FR.utf8', 'fra');?>
    <div class="container-fluid">
        @foreach($sorties as $sortie)
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4" style="border-color: black; border-style: inset">
                    <div class="row">
                        {{--    //touver la bonne div pour centrer le contenu--}}

                        <div class="col-md-12">
                            <br>
                            <h2>{{$sortie->titre}}<br></h2>
                            @if(isset($sortie->photo->chemin_photo))
                            <img class="d-block w-100" src="/img/sorties/{{$sortie->photo->chemin_photo}}" style="height:auto; width:100%; margin: 1em auto">
                            @endif
{{--                            <img class="d-block w-100" src="/img/sorties/{{$sortie->photo->chemin_photo}}" style="height:auto; width:100%; margin: 1em auto">--}}
                                <h4>On se retrouve le : {{strftime("%A %d %B %Y", strtotime($sortie->jour))}}</h4><br>
                                <h4>On ira a : {{$sortie->lieu}}</h4>
                                <p>{{substr($sortie->description, 0, 100)}}...</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                            </div>
                            <div class="btn-group btn-group-lg mb-4" role="group" aria-label="Basic example">
                                <h2><a class="btn btn-success"
                                       href="sortiedetails/{{$sortie->id}}">Détails</a>
                                </h2><br>

                                @if((Auth::check() && Auth::User()->admin === 1))
                                    <form method="POST" action="{{ route('sortieModifier') }}"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <input id="id" type="hidden" class="form-control" name="id"
                                               value="{{$sortie->id}}" required autocomplete="chemin_photo"
                                               autofocus>
                                        <button class="btn btn-warning" type="submit" name="modifier"
                                                value="modifier"
                                                onclick="return confirm('Etes vous sûr ?')" class="btn btn-primary">
                                            {{ __('Modifier') }}
                                        </button>
                                    </form>
                                    <form method="POST" action="{{ route('sorties') }}" enctype="multipart/form-data">
                                        @csrf
                                        <input id="id" type="hidden" class="form-control" name="id"
                                               value="{{$sortie->id}}" required autocomplete="chemin_photo"
                                               autofocus>
                                        <button class="btn  btn-danger" type="submit" name="supprimer"
                                                value="supprimer"
                                                onclick="return confirm('Etes vous sûr ?')" class="btn btn-primary">
                                            {{ __('Supprimer') }}
                                        </button>
                                    </form>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <br><hr><br>
        </div>
        <br><hr><br>
        @endforeach
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <div class="col-12 mt-5 text-center">
                    <span>{{$sorties->links()}}</span>
                </div>
            </div>
        </div>



    @endsection
