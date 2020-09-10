@extends('layouts.app')

@section('content')

<div id="support" class="section wb">
    <div class="container">
        <div class="section-title text-center">
            <h2>Nous contacter</h2>
        </div><!-- end title -->

        <div class="row">
            <div class="col-md-6">
                <div class="contact_form">
                    <div id="message"></div>
                    <form id="contactform"  action="{{ route('contact') }}" name="contactform" method="post">
                        @csrf
                        @if(session('sukces'))<p style="color:red">{{session('sukces')}}</p>@endif
                        <fieldset class="row row-fluid">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Nom">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Prénom">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Mail">
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <textarea class="form-control" name="comments" id="comments" rows="6" placeholder="Veuillez écrire votre message ici"></textarea>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" class="text-center img-st">
                                <button type="submit" value="SEND" id="submit" class="bttn-new-a">Envoyer</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div><!-- end col -->
            <div class="col-md-6">
                <div class="map-box">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1432.5862317590925!2d3.0525794158690704!3d44.10043325307049!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x8ad5358f4e1c0862!2sMOTO%20CLUB%20MILLAU%20PASSION%20AVEYRON%2012!5e0!3m2!1sfr!2sfr!4v1597394704054!5m2!1sfr!2sfr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>                    <p>Moto Club Millau Passion</p>
                    <p>95 Rue Molière</p>
                    <p>12100 Millau</p>
                    <p>mcmp12100@gmail.com</p>
                </div>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end section -->

@endsection
