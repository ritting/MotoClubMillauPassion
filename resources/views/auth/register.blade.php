@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('S\'enregistrer') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

{{--                        name--}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input type="checkbox" id="name_v" name="name_v" value="1">
                                <label for="nom_v">Nom visible par les adhérants ?</label>
                            </div>
                        </div>

{{--                        mail--}}
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Addresse mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input type="checkbox" id="email_v" name="email_v" value="1">
                                <label for="nom_v">Adresse mail visible par les adhérants ?</label>
                            </div>
                        </div>

{{--                        password--}}
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

{{--                        confirm password--}}
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmer mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

{{--                        adresse--}}
                        <div class="form-group row">
                            <label for="adresse" class="col-md-4 col-form-label text-md-right">{{ __('Adresse') }}</label>

                            <div class="col-md-6">
                                <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse') }}" required autocomplete="adresse">

                                @error('adresse')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input type="checkbox" id="adresse_v" name="adresse_v" value="1">
                                <label for="adresse_v">Adresse visible par les adhérants ?</label>
                            </div>
                        </div>

{{--                        code postal--}}
                        <div class="form-group row">
                            <label for="code_postal" class="col-md-4 col-form-label text-md-right">{{ __('Code postal') }}</label>

                            <div class="col-md-6">
                                <input id="code_postal" type="text" class="form-control @error('code_postal') is-invalid @enderror" name="code_postal" value="{{ old('code_postal') }}" required autocomplete="code_postal">

                                @error('code_postal')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

{{--                        ville--}}
                        <div class="form-group row">
                            <label for="ville" class="col-md-4 col-form-label text-md-right">{{ __('Ville') }}</label>

                            <div class="col-md-6">
                                <input id="ville" type="text" class="form-control @error('ville') is-invalid @enderror" name="ville" value="{{ old('ville') }}" required autocomplete="ville">

                                @error('ville')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

{{--                        telephone--}}
                        <div class="form-group row">
                            <label for="telephone" class="col-md-4 col-form-label text-md-right">{{ __('Téléphone') }}</label>

                            <div class="col-md-6">
                                <input id="telephone" type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone') }}" required autocomplete="telephone">

                                @error('telephone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input type="checkbox" id="telephone_v" name="telephone_v" value="1">
                                <label for="telephone_v">Téléphone visible par les adhérants ?</label>
                            </div>
                        </div>

{{--                        date de naissance--}}
                        <div class="form-group row">
                            <label for="date_de_naissance" class="col-md-4 col-form-label text-md-right">{{ __('Date de naissance') }}</label>

                            <div class="col-md-6">
                                <input id="date_de_naissance" type="date" class="form-control @error('date_de_naissance') is-invalid @enderror" name="date_de_naissance" value="{{ old('date_de_naissance') }}" required autocomplete="date_de_naissance">

                                @error('date_de_naissance')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input type="checkbox" id="date_de_naissance_v" name="date_de_naissance_v" value="1">
                                <label for="date_de_naissance_v">Date de naissance visible par les adhérants ?</label>
                            </div>
                        </div>

                        {{--                        ville de naissance--}}
                        <div class="form-group row">
                            <label for="ville_natale" class="col-md-4 col-form-label text-md-right">{{ __('Ville natale') }}</label>
                            <div class="col-md-6">
                                <input id="ville_natale" type="text" class="form-control @error('ville_natale') is-invalid @enderror" name="ville_natale" value="{{ old('ville_natale') }}" required autocomplete="ville_natale">
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
                                <select id="categorie" name="categorie" required>
                                    <option value="" selected disabled hidden>Choisir la cylindrée</option>
                                    <option value="< 50">< 50</option>
                                    <option value="= 125">= 125</option>
                                    <option value="> 125">> 125</option>
                                </select>
                                @error('categorie')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

{{--                        submit--}}
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Soumettre') }}
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
