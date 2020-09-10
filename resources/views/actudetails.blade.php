@extends('layouts.app')

@section('content')
    {{--//european time--}}
    <?php setlocale(LC_TIME, 'fr_FR.utf8', 'fra');?>
    <div class="text-center" class="align-items-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div class="content-center">
                        <h1>{{$actu->getTitre()}}</h1>
                    </div>
                    <div class="content-right">
                        <p>Nouvelle posté le {{strftime("%A %d %B %Y", strtotime($actu->getCreated_At()))}}</p>
                    </div>
                    @if(($actu->getUpdated_At()))
                        <p>Modifié le {{strftime("%A %d %B %Y", strtotime($actu->getUpdated_At()))}}</p>
                    @endif
                    <br>
{{--                    <div align=Justify>--}}
{{--                        {{str_replace('<br />', '<br/>',nl2br($actu->getDescription()))}}--}}
{{--                    </div>--}}
{{--                    str replace and nl2br is for get the "saut a la ligne" from the database--}}
                    <div align=Justify>
                        <?php echo str_replace('<br />', '<br/>',nl2br($actu->getDescription())) ?>
                    </div>
                    <br>
                </div>
                <div class="col-lg-3"></div>
            </div>
            <br>
{{--            see photos // admin have a distinct part for give him the possibility of delete each picture--}}
            @if(Auth::check() && Auth::User()->admin === 1)
                @foreach($listphoto as $photo)
                <img src="../img/actu/{{$photo->getChemin_photo()}}"
                     style="height:auto; width:100%; margin: 1em auto">
                <form method="POST" action="{{ route('details') }}" enctype="multipart/form-data">
                    @csrf
                    <input id="id" type="hidden" class="form-control" name="id"
                           value="{{$photo->getId()}}" autofocus>
                    <input id="id" type="hidden" class="form-control" name="id_actu"
                           value="{{$photo->getId_actu()}}" autofocus>
                    <button class="btn btn-danger" type="submit" name="supprimer"
                            value="modifier"
                            onclick="return confirm('Etes vous sûr ?')" class="btn btn-primary">
                        {{ __('Supprimer photo') }}
                    </button>
                </form>
                @endforeach
            @else
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <div id="carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <?php $nb = 0; ?>
                            @foreach($listphoto as $photo)
                                <li data-target=".carousel" data-slide-to="{{$nb}}"
                                    class=" @if($nb === 0)active @endif"></li>
                                <?php $nb++; ?>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            <?php $nb1 = 0; ?>
                            @foreach($listphoto as $photo)
                                <div class="carousel-item @if($nb1 === 0)active @endif">
                                    <img class="d-block w-100" src="../img/actu/{{$photo->getChemin_photo()}}"
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
@endsection
