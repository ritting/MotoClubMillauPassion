@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Modifier les informations du profil') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('gestionProfil') }}" enctype="multipart/form-data">
                            @csrf
@if(session('sukces'))<p style="color:red">{{session('sukces')}}</p>@endif
{{--                            nom--}}
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name}}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <input type="checkbox" id="name_v" name="name_v" value="1" @if(Auth::user()->name_v===1)checked @endif>
                                    <label for="nom_v">Nom visible par les adhérants ?</label>
                                </div>
                            </div>

{{--                            id--}}
                            <div class="form-group row" visible="false">
                                <div class="col-md-6">
                                    <input id="id" type="hidden" class="form-control @error('id') is-invalid @enderror" name="id" value="{{ Auth::user()->id}}" required autocomplete="name" autofocus>
                                    @error('id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

{{--                            mail--}}
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Addresse mail') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <input type="checkbox" id="email_v" name="email_v" value="1" @if(Auth::user()->email_v===1)checked @endif>
                                    <label for="nom_v">Adresse mail visible par les adhérants ?</label>
                                </div>
                            </div>

{{--                            //Adresse--}}
                            <div class="form-group row">
                                <label for="adresse" class="col-md-4 col-form-label text-md-right">{{ __('Adresse') }}</label>

                                <div class="col-md-6">
                                    <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ Auth::user()->adresse }}" required autocomplete="adresse">

                                    @error('adresse')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <input type="checkbox" id="adresse_v" name="adresse_v" value="1" @if(Auth::user()->adresse_v===1)checked @endif>
                                    <label for="adresse_v">Adresse visible par les adhérants ?</label>
                                </div>
                            </div>

{{--                            code postal--}}
                            <div class="form-group row">
                                <label for="code_postal" class="col-md-4 col-form-label text-md-right">{{ __('Code postal') }}</label>

                                <div class="col-md-6">
                                    <input id="code_postal" type="text" class="form-control @error('code_postal') is-invalid @enderror" name="code_postal" value="{{ Auth::user()->code_postal }}" required autocomplete="code_postal">

                                    @error('code_postal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

{{--                            ville--}}
                            <div class="form-group row">
                                <label for="ville" class="col-md-4 col-form-label text-md-right">{{ __('Ville') }}</label>

                                <div class="col-md-6">
                                    <input id="ville" type="text" class="form-control @error('ville') is-invalid @enderror" name="ville" value="{{ Auth::user()->ville }}" required autocomplete="ville">

                                    @error('ville')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

{{--                            telephone--}}
                            <div class="form-group row">
                                <label for="telephone" class="col-md-4 col-form-label text-md-right">{{ __('Téléphone') }}</label>

                                <div class="col-md-6">
                                    <input id="telephone" type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ Auth::user()->telephone }}" required autocomplete="telephone">

                                    @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <input type="checkbox" id="telephone_v" name="telephone_v" value="1" @if(Auth::user()->telephone_v===1)checked @endif>
                                    <label for="telephone_v">Téléphone visible par les adhérants ?</label>
                                </div>
                            </div>

{{--                            date de naissance--}}
                            <div class="form-group row">
                                <label for="date_de_naissance" class="col-md-4 col-form-label text-md-right">{{ __('Date de naissance') }}</label>

                                <div class="col-md-6">
                                    <input id="date_de_naissance" type="date" class="form-control @error('date_de_naissance') is-invalid @enderror" name="date_de_naissance" value="{{ Auth::user()->date_de_naissance }}" required autocomplete="date_de_naissance">

                                    @error('date_de_naissance')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <input type="checkbox" id="date_de_naissance_v" name="date_de_naissance_v" value="1" @if(Auth::user()->date_de_naissance_v===1)checked @endif>
                                    <label for="date_de_naissance_v">Date de naissance visible par les adhérants ?</label>
                                </div>
                            </div>

                            {{--                        ville natale--}}
                            <div class="form-group row">
                                <label for="ville_natale" class="col-md-4 col-form-label text-md-right">{{ __('Ville natale') }}</label>
                                <div class="col-md-6">
                                    <input id="ville_natale" type="text" class="form-control @error('ville_natale') is-invalid @enderror" name="ville_natale" value="{{ Auth::user()->ville_natale }}" required autocomplete="ville_natale">
                                    @error('ville_natale')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            {{--                        catégorie--}}
                            <div class="form-group row">
                                <label for="categorie" class="col-md-4 col-form-label text-md-right">{{ __('Categorie') }}</label>
                                <div class="col-md-6">
                                    <select id="categorie" name="categorie" value="{{Auth::user()->categorie}}">
                                        <option value="< 50" @if(Auth::user()->categorie === '< 50') echo selected @endif>< 50</option>
                                        <option value="= 125" @if(Auth::user()->categorie === '= 125') echo selected @endif>= 125</option>
                                        <option value="> 125" @if(Auth::user()->categorie === '> 125') echo selected @endif>> 125</option>
                                    </select>
                                    @error('categorie')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

{{--                            photo--}}
                            <div class="form-group row">
                                <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Photo (sans casque)') }}</label>

                                <div class="col-md-6">
                                    <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" autocomplete="photo">

                                    @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <input type="checkbox" id="photo_v" name="photo_v" value="1" @if(Auth::user()->photo_v===1)checked @endif>
                                    <label for="photo">Photo visible par les adhérants ?</label>
                                </div>
                            </div>

                            {{--                            chemin photo sert a supprimer l'ancien avant de mettre a jour ou a récupérer le chemin si la photo n'est pas mise a jour--}}
                            <div class="form-group row" visible="false">
                                <div class="col-md-6">
                                    <input id="chemin_photo" type="hidden" class="form-control @error('id') is-invalid @enderror" name="chemin_photo" value="{{ Auth::user()->chemin_photo}}" required autocomplete="chemin_photo" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

{{--                            submit--}}
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" name="modifier" value="modifier" class="btn btn-primary">
                                        {{ __('Modifier') }}
                                    </button>
                                    <button type="submit" name="supprimer" value="supprimer" onclick="return confirm('Etes vous sûr ?')" class="btn btn-primary">
                                        {{ __('Supprimer le profil') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
