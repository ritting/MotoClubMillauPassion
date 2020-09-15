@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Ajouter une sortie') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('ajoutSortie') }}" enctype="multipart/form-data">
                            @csrf
                            @if(session('sukces'))<p style="color:red">{{session('sukces')}}</p>@endif

                            {{--                            id (uniquement en cas de modification--}}
                            @if(isset($sortie))<div class="form-group row" visible="false">
                                <div class="col-md-6">
                                    <input id="id" type="hidden" class="form-control @error('id') is-invalid @enderror" name="id" value="{{$sortie->id}}" required autocomplete="name" autofocus>
                                    @error('id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>@endif

                            {{--                            Titre--}}
                            <div class="form-group row">
                                <label for="titre" class="col-md-4 col-form-label text-md-right">{{ __('Titre') }}</label>
                                {{--    if isset $actu the view is for an update and we get the olds values else the view is for an insert--}}
                                <div class="col-md-6">
                                    <input id="titre" type="text" class="form-control @error('titre') is-invalid @enderror" name="titre" required autocomplete="titre" autofocus @if(isset($sortie))value="{{$sortie->titre}}"@endif>

                                    @error('titre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            {{--                            //Description--}}
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea rows="5" id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description">@if(isset($sortie)){{$sortie->description}}@endif</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{--                            //jour--}}
                            <div class="form-group row">
                                <label for="jour" class="col-md-4 col-form-label text-md-right">{{ __('Jour') }}</label>

                                <div class="col-md-6">
                                    <input rows="5" id="jour" type="date" class="form-control @error('jour') is-invalid @enderror" name="jour" required autocomplete="description"
                                        @if(isset($sortie))value="{{$sortie->jour}}"@endif>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{--                            //lieu--}}
                            <div class="form-group row">
                                <label for="lieu" class="col-md-4 col-form-label text-md-right">{{ __('Lieu') }}</label>

                                <div class="col-md-6">
                                    <input rows="5" id="lieu" type="text" class="form-control @error('lieu') is-invalid @enderror" name="lieu" required autocomplete="lieu"
                                        @if(isset($sortie))value="{{$sortie->lieu}}"@endif>
                                    @error('lieu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            {{--                            photo--}}
                            <div class="form-group row">
                                <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Photos') }}</label>

                                <div class="col-md-6">
                                    <input id="photo0" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo0" autocomplete="photo">
                                    <input id="photo1" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo1" autocomplete="photo">
                                    <input id="photo2" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo2" autocomplete="photo">
                                    <input id="photo3" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo3" autocomplete="photo">
                                    {{--                                    @error('photo')--}}
                                    {{--                                    <span class="invalid-feedback" role="alert">--}}
                                    {{--                                        <strong>{{ $message }}</strong>--}}
                                    {{--                                    </span>--}}
                                    {{--                                    @enderror--}}

                                </div>
                            </div>

                            {{--                            submit--}}
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" @if(!isset($sortie))name="ajouter" value="ajouter"@endif @if(isset($sortie)) name="modifier" value="modifier"@endif class="btn btn-primary">
                                        @if(!isset($sortie)){{ __('Publier') }}@endif
                                        @if(isset($sortie)){{ __('Modifier') }}@endif
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
