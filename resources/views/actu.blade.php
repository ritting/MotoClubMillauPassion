@extends('layouts.app')

@section('content')

    {{--//european time--}}
    <?php setlocale(LC_TIME, 'fr_FR.utf8', 'fra');?>
    <div class="container-fluid">

        @foreach($actus as $actu)
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4" style="border-color: black; border-style: inset">
                    <div class="row">
                        {{--    //touver la bonne div pour centrer le contenu--}}

                        <div class="col-md-12">
                            <br>
                            <h2>{{$actu->titre}}<br></h2>
                            <h4>Ajouté le {{strftime("%A %d %B %Y", strtotime($actu->created_at))}}</h4><br>
                            <p>{{substr($actu->description, 0, 100)}}...</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                        </div>
                        <div class="btn-group btn-group-lg mb-4" role="group" aria-label="Basic example">
                            <h2><a class="btn btn-success"
                                   href="details/{{$actu->id}}">Détails</a>
                            </h2><br>

                            @if((Auth::check() && Auth::User()->admin === 1))
                                <form method="POST" action="{{ route('actuGoModifier') }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <input id="id" type="hidden" class="form-control" name="id"
                                           value="{{$actu->id}}" required autocomplete="chemin_photo"
                                           autofocus>
                                    <button class="btn btn-warning" type="submit" name="modifier"
                                            value="modifier"
                                            onclick="return confirm('Etes vous sûr ?')" class="btn btn-primary">
                                        {{ __('Modifier') }}
                                    </button>
                                </form>
                                <form method="POST" action="{{ route('actu') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input id="id" type="hidden" class="form-control" name="id"
                                           value="{{$actu->id}}" required autocomplete="chemin_photo"
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
                <span>{{$actus->links()}}</span>
            </div>
        </div>
    </div>



@endsection
