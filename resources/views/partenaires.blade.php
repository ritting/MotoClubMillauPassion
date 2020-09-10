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
                        <div class="card-header">{{ __('Ajouter un partenaire') }}</div>
                        <div class="card-body">
                            {{--                            Start form for add text--}}
                            <form method="POST" action="{{ route('partenaires') }}" enctype="multipart/form-data">
                                @csrf
                                @if(session('sukces'))<p style="color:red">{{session('sukces')}}</p>@endif
                                {{--                            photo--}}
                                <div class="form-group row">
                                    <input id="photo" type="file"
                                           class="form-control @error('photo') is-invalid @enderror" name="photo"
                                           autocomplete="photo">
                                    @error('titre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                {{--                            //lien--}}
                                <div class="form-group row">
                                    <label for="lien"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Lien vers le site du partenaire') }}</label>

                                    <div class="col-md-6">
                                    <input rows="5" id="lien" type="text"
                                              class="form-control @error('lien') is-invalid @enderror" name="lien">
                                        @error('lien')
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
            </div>
        </div>
    @endif
    <br/>
    <div class="container-fluid">
        @foreach($partenaires as $partenaire)
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="../img/partenaires/{{$partenaire->lien_image}}"
                                 style="height:auto; width:100%; margin: 1em auto">
                            <a href="{{$partenaire->lien_site}}">{{$partenaire->lien_site}}</a>
                            @if((Auth::check() && Auth::User()->admin === 1))
                                <form method="POST" action="{{ route('partenaires') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input id="id" type="hidden" class="form-control" name="id"
                                           value="{{$partenaire->id}}" autofocus>
                                    <button type="submit" name="supprimer" class="btn btn-danger" onclick="return confirm('Etes vous sûr ?')">
                                        {{ __('Supprimer') }}
                                    </button>
                                </form>
                            @endif
                        </div>
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
