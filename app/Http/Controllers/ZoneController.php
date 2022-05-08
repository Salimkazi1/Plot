<?php
/**
 * Created by PhpStorm.
 * User: moi
 * Date: 20/08/2019
 * Time: 11:36
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Zone;
use Carbon\Carbon;

class ZoneController extends Controller
{

   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Fonction d'affichage de la liste des controleurs
    public function index()
    {
        $zones = Zone::all();

        return view("zone/index", compact("zones"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //fonction pour afficher le formulaire d'ajout d'un controleur
    public function create()
    {
        $zones = Zone::all();

        return view("zone/ajouter", compact("zones"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //LI
        //    dd($request->input());
        //Récupération des inputs

        $libelle_zone = $request->input("libelle_niveau");

        $nombre_places_max = $request->input("nombre_places_max");



//dd($libelle_zone);


        //Vérification l'existance de l'@ IP
        $exist_libelle_zone = Zone::where("LIBELLE_NIVEAU","=",$libelle_zone)->first();


        if(!$exist_libelle_zone){

            //creation d'instance d'un controleur
            $newZone = new Zone();


            $newZone->LIBELLE_NIVEAU = $libelle_zone;
            $newZone->NB_PLACES_MAX = $nombre_places_max;
            $newZone->NB_PLACES_DISPO = $nombre_places_max;


            //Ajout dans la base de données
            $newZone->save();

            return redirect("/zone/index")->with("success_msg","Zone ajoutée avec succès");
        }


        else {
            //message d'erreur email existe déjà dans la base de données
            return redirect("/zone/ajouter")->withInput()->with("error_msg", "Cette libellée de niveau existe déjà");
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($ID)
    {
        //
        $zone = Zone::find($ID);
        //$niveaux = Niveau::all();
        if($zone){
            return view('zone/modifier', compact("zone", "niveaux"));
        }
        else{
            return redirect("/zone/index");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request->input());
        //
        //Récupération des informations du controleur de la base de données
        $zone = Zone::find($id);



        $libelle_zone = $request->input("libelle_zone");
        $nombre_places_max = $request->input("nombre_places_max");
        $nombre_places_dispo = $request->input("nombre_places_dispo");

        $id_zone = $request->input("id");





        //Vérification l'existance de l'@IP
        $exist_libelle_zone = Zone::where("LIBELLE_NIVEAU","=",$libelle_zone)->where("ID","!=",$id)->first();
        if(!$exist_libelle_zone){


            $zone->LIBELLE_NIVEAU = $libelle_zone;
            $zone->NB_PLACES_MAX = $nombre_places_max;
            $zone->NB_PLACES_DISPO = $nombre_places_dispo;
            $zone->ID = $id_zone;

            //dd($nombre_places_dispo);
            //modification dans la base de données
            $zone->update();

            return redirect("/zone/index")->with("success_msg","Zone modifiée avec succès");
        }


        else{
            //message d'erreur adresse ip existe déjà dans la base de données
            return redirect("/zone/modifier/".$id)->withInput(Input::except('libelle_zone'))->with("error_msg"," cette libellé de niveau existe déjà");
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        //
        //dd($request->input());
        $id_zone = $request->input("ID");
        //dd($id_zone);
        // Vérification de l'ID de la zone à supprimer
        $zone = Zone::find($id_zone);

        if($zone){
            //Suppression du controleur
            Zone::find($id_zone)->delete();
            return redirect("/zone/index")->with("success_msg","Zone supprimée avec succès");
        }
        else{
            return redirect("/zone/index");
        }

    }
    public function affichageZone($ID)
    {
        //
        $zone = Zone::find($ID);
        //$niveaux = Niveau::all();
        if($zone){
            return view('zone/affiche', compact("zone", "niveau"));
        }
        else{
            return redirect("/zone/index");
        }
    }

}

