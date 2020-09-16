@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">@if(!isset($actu)){{ __('Ajouter une actualité') }}@endif
                        @if(isset($actu)){{ __('Modifier une actualité') }}@endif</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('ajoutActu') }}" enctype="multipart/form-data">
                            @csrf
                            @if(session('sukces'))<p style="color:red">{{session('sukces')}}</p>@endif

{{--                            id (uniquement en cas de modification--}}
                            @if(isset($actu))<div class="form-group row" visible="false">
                                <div class="col-md-6">
                                    <input id="id" type="hidden" class="form-control @error('id') is-invalid @enderror" name="id" value="{{$actu->getId()}}" required autocomplete="name" autofocus>
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
                                    <input id="titre" type="text" class="form-control @error('titre') is-invalid @enderror" name="titre" required autocomplete="titre" autofocus @if(isset($actu))value="{{$actu->getTitre()}}"@endif>

                                    @error('titre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <input type="checkbox" id="prive" name="prive" value="1" @if(isset($actu) && $actu->getPrive() === 1)checked @endif>
                                    <label for="prive">Actualité visible seulement par les adhérants ?</label>
                                </div>
                            </div>


                            {{--                            //Description--}}
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea rows="5" id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description">@if(isset($actu)){{$actu->getDescription()}}@endif</textarea>
                                    @error('description')
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
                                    @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                </div>
                            </div>

                            {{--                            submit--}}
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" @if(!isset($actu))name="ajouter" value="ajouter"@endif @if(isset($actu)) name="modifier" value="modifier"@endif class="btn btn-primary">
                                        @if(!isset($actu)){{ __('Publier') }}@endif
                                        @if(isset($actu)){{ __('Modifier') }}@endif
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
