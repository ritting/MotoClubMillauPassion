<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

Route::get('gestionProfil', 'GestionProfilController@index')->name('gestionProfil');

Route::post('gestionProfil', 'GestionProfilController@store')->name('gestionProfil');

Route::get('actu', 'ActuController@index')->name('actu');

Route::post('actu', 'ActuController@delete')->name('actu');

Route::get('actuGoModifier', 'HomeController@redirectWelcome')->name('actuGoModifier');//just in the case someone notauthorised know the adress and try to connect

Route::post('actuGoModifier', 'ActuController@update')->name('actuGoModifier');

Route::get('details/{id}', 'ActuDetailsController@index')->name('actudetails');

Route::post('details', 'ActuDetailsController@deletePhoto')->name('details');

Route::get('ajoutActu', 'AjoutActuController@index')->name('ajoutActu');

Route::post('ajoutActu', 'AjoutActuController@store')->name('ajoutActu');

Route::get('contact', 'ContactController@index')->name('contact');

Route::post('contact', 'ContactController@send')->name('contact');

Route::get('menbres', 'MenbresController@index')->name('menbres');

Route::post('menbres', 'MenbresController@gestion')->name('menbres');

Route::get('reglement', 'ReglementController@index')->name('reglement');

Route::post('reglement', 'ReglementController@gestion')->name('reglement');

Route::get('partenaires', 'PartenairesController@index')->name('partenaires');

Route::post('partenaires', 'PartenairesController@gestion')->name('partenaires');

Route::get('apropos', 'ApropoController@index')->name('apropos');

Route::get('sorties', 'SortiesController@index')->name('sorties');

Route::post('sorties', 'SortiesController@delete')->name('sorties');

Route::get('ajoutSortie', 'SortiesController@getAjoutSortiesView')->name('ajoutSortie');

Route::post('ajoutSortie', 'SortiesController@insert')->name('ajoutSortie');

Route::post('sortieModifier', 'SortiesController@update')->name('sortieModifier');

Route::get('sortiedetails/{id}', 'SortiedetailsController@getSortieById')->name('sortiedetails');

Route::post('sortiedetails', 'SortiedetailsController@deletePhoto')->name('sortiedetails');

Route::post('sortiegestion', 'SortiedetailsController@gestion')->name('sortiegestion');

Route::get('photos', 'PhotosController@index')->name('photos');
