<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('login', 'AuthentificationController@index');
Route::post('login', 'AuthentificationController@login');
Route::post('logout', 'AuthentificationController@logout');



Route::group(['middleware' => ['loginM']], function () {

    //Routes Dashboard
    Route::get('/', 'DashboardController@index');

    //Routes utilisateur
    Route::get('utilisateur/index', 'UtilisateurController@index');
    Route::get('utilisateur/ajouter', 'UtilisateurController@create');
    Route::post('utilisateur/ajouter', 'UtilisateurController@store');
    Route::get('utilisateur/modifier/{id}', 'UtilisateurController@edite');
    Route::post('utilisateur/modifier/{id}', 'UtilisateurController@update');
    Route::post('utilisateur/supprimer', 'UtilisateurController@delete');

    //Routes abonne
    Route::get('abonne/index', 'AbonneController@index');
    Route::get('abonne/ajouter', 'AbonneController@create');
    Route::post('abonne/ajouter', 'AbonneController@store');
    Route::get('abonne/modifier/{id}', 'AbonneController@edit');
    Route::post('abonne/modifier/{id}', 'AbonneController@update');
    Route::post('abonne/supprimer', 'AbonneController@delete');



    //Routes controleurs
    Route::get('controleur/index', 'ControleurController@index');
    Route::get('controleur/ajouter', 'ControleurController@create');
    Route::post('controleur/ajouter', 'ControleurController@store');
    Route::get('controleur/modifier/{id}', 'ControleurController@edit');
    Route::post('controleur/modifier/{id}', 'ControleurController@update');
    Route::post('controleur/supprimer', 'ControleurController@delete');




    //Routes historique
    Route::get('historique/index/{code}', 'HistoriqueController@afficher');

    //Routes Gestion par plages horaires
    Route::get('plagehoraire/index', 'PlageHoraireController@index');
    Route::post('plagehoraire/ajouter', 'PlageHoraireController@store');
    Route::get('plagehoraire/ajouter', 'PlageHoraireController@create');
    Route::get('plagehoraire/modifier/{id}', 'PlageHoraireController@edit');
    Route::post('plagehoraire/modifier/{id}', 'PlageHoraireController@update');
    Route::post('plagehoraire/supprimer', 'PlageHoraireController@delete');

    //Routes Gestion des zones

    Route::get('zone/index', 'ZoneController@index');
    Route::post('zone/ajouter', 'ZoneController@store');
    Route::get('zone/ajouter', 'ZoneController@create');
    Route::get('zone/modifier/{id}', 'ZoneController@edit');
    Route::post('zone/modifier/{id}', 'ZoneController@update');
    Route::post('zone/supprimer', 'ZoneController@delete');
    Route::get('zone/affiche/{ID}', 'ZoneController@affichageZone');

});
