@extends('layouts.app')

@section('content')
    {{--//european time--}}
    <?php setlocale(LC_TIME, 'fr_FR.utf8', 'fra');?>
    <div class="text-center" class="align-items-center">
        <div class="container-fluid">

            <br>
            {{--            see photos // admin have a distinct part for give him the possibility of delete each picture--}}
            @if(Auth::check() && Auth::User()->admin === 1)
                <div class="row">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                        @foreach($photos as $photo)
                            <img src="/img/actu/{{$photo->chemin_photo}}"
                                 style="height:auto; width:100%; margin: 1em auto">
                        @endforeach
                    </div>

                    <div class="col-lg-3"></div>
                </div>
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
                                        <img class="d-block w-100" src="/img/actu/{{$photo->chemin_photo}}"
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
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
            <div class="col-12 mt-5 text-center">
                <span>{{$photos->links()}}</span>
            </div>
        </div>
    </div>
@endsection
