@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

            <p>Bienvenue {{Auth::user()->name}}</p>
        <div class="col-md-8">
            <div class="card">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Vous êtes connecté !') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
