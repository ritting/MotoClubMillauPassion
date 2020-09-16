@extends('layouts.app')

@section('content')

    {{--//european time--}}
    <?php setlocale(LC_TIME, 'fr_FR.utf8', 'fra');?>

    <br/>
    @if((Auth::check() && Auth::User()->admin === 1))
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{ __('Ajouter un article') }}</div>
                        <div class="card-body">
                            {{--                            Start form for add text--}}
                            <form method="POST" action="{{ route('reglement') }}" enctype="multipart/form-data">
                                @csrf
                                @if(session('sukces'))<p style="color:red">{{session('sukces')}}</p>@endif
                                {{--                            article--}}
                                <div class="form-group row">
                                    <label for="article"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Article') }}</label>
                                    {{--    if isset $actu the view is for an update and we get the olds values else the view is for an insert--}}
                                    <div class="col-md-6">
                                        <input id="article" type="text"
                                               class="form-control @error('article') is-invalid @enderror"
                                               name="article" autofocus>
                                        @error('titre')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                {{--                            //article--}}
                                <div class="form-group row">
                                    <label for="texte"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Texte') }}</label>

                                    <div class="col-md-6">
                                    <textarea rows="5" id="texte" type="text"
                                              class="form-control @error('texte') is-invalid @enderror" name="texte">

                                    </textarea>
                                        @error('texte')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                {{--                            submit--}}
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" name="publier" class="btn btn-primary">
                                            {{ __('Publier') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                            {{--                            End form for add text--}}
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{ __('Ajouter une photo') }}</div>
                        <div class="card-body">
                            {{--                            Start form for add picture--}}
                            <form method="POST" action="{{ route('reglement') }}" enctype="multipart/form-data">
                                @csrf
                                @if(session('sukces'))<p style="color:red">{{session('sukces')}}</p>@endif

                                <div class="form-group row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-6">
                                        <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" autocomplete="photo">
                                        @error('texte')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                {{--                            submit--}}
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" name="publier_photo" class="btn btn-primary">
                                            {{ __('Publier photo') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                            {{--                            End form for add picture--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <br/>
    <div class="container-fluid">
        @foreach($reglements as $reglement)
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4" style="border-color: black; border-style: inset">
                    <div class="row">
                        @if($reglement->article === 'photo')
                        <div class="col-md-12">
                            <p>Modifié le {{strftime("%A %d %B %Y", strtotime($reglement->created_at))}}</p>
                            <img src="../img/reglement/{{$reglement->texte}}" style="height:auto; width:100%; margin: 1em auto">
                            @if((Auth::check() && Auth::User()->admin === 1))
                                <form method="POST" action="{{ route('reglement') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input id="id" type="hidden" class="form-control" name="id"
                                           value="{{$reglement->id}}" autofocus>
                                    <button type="submit" name="supprimer" class="btn btn-danger">
                                        {{ __('Supprimer') }}
                                    </button>
                                </form>
                            @endif
                        </div>
                        @else
                        <div class="col-md-12">
                            <p>Modifié le {{strftime("%A %d %B %Y", strtotime($reglement->created_at))}}</p>
                            <h2>{{$reglement->article}}</h2>
                            <div align=Justify>
                                <?php echo str_replace('<br />', '<br/>', nl2br($reglement->texte)) ?>
                                <br>
                                @if((Auth::check() && Auth::User()->admin === 1))
                                    <form method="POST" action="{{ route('reglement') }}" enctype="multipart/form-data">
                                        @csrf
                                        <input id="id" type="hidden" class="form-control" name="id"
                                               value="{{$reglement->id}}" autofocus>
                                        <button type="submit" name="supprimer" class="btn btn-danger">
                                            {{ __('Supprimer') }}
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <hr><br>
        @endforeach
    </div>
@endsection
