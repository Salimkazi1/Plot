<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Controleur;
use App\Niveau;


class ControleurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Fonction d'affichage de la liste des controleurs
    public function index()
    {

        //
        $controleurs = Controleur::with("Niveau")->get();

        return view("controleur/index", compact("controleurs"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //fonction pour afficher le formulaire d'ajout d'un controleur
    public function create()
    {
        $niveaux = Niveau::all();

        return view("controleur/ajouter", compact("niveaux"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //    dd($request->input());
        //Récupération des inputs

        $adresse_ip = $request->input("adresse_ip");
        $type = $request->input("type");
        $id_niveau = $request->input("id_niveau");





        //Vérification l'existance de l'@ IP
        $existAdresseIp = Controleur::where("adresse_ip","=",$adresse_ip)->first();


        if(!$existAdresseIp){

            //creation d'instance d'un controleur
            $newControleur = new Controleur();


            $newControleur->adresse_ip = $adresse_ip;
            $newControleur->type = $type;
            $newControleur->id_niveau = $id_niveau;


            //Ajout dans la base de données
            $newControleur->save();

            return redirect("/controleur/index")->with("success_msg","Contrôleur ajouté avec succès");
        }


        else {
            //message d'erreur email existe déjà dans la base de données
            return redirect("/controleur/ajouter")->withInput()->with("error_msg", "Cette adresse IP existe déjà");
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $controleur = Controleur::find($id);
        $niveaux = Niveau::all();
        if($controleur){
            return view('controleur.modifier', compact("controleur", "niveaux"));
        }
        else{
            return redirect("/controleur/index");
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
        $controleur = Controleur::find($id);



        $adresse_ip = $request->input("adresse_ip");
        $type = $request->input("type");
        $id_niveau = $request->input("id_niveau");





        //Vérification l'existance de l'@IP
        $existAdresseIp = Controleur::where("adresse_ip","=",$adresse_ip)->where("id","!=",$id)->first();
        if(!$existAdresseIp){


            $controleur->adresse_ip = $adresse_ip;
            $controleur->type = $type;
            $controleur->id_niveau = $id_niveau;


            //modification dans la base de données
            $controleur->update();

            return redirect("/controleur/index")->with("success_msg","Controleur modifié avec succès");
        }


        else{
            //message d'erreur adresse ip existe déjà dans la base de données
            return redirect("/controleur/modifier/".$id)->withInput(Input::except('adresse_ip'))->with("error_msg"," l'adresse IP existe déjà");
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
        $id = $request->input("id");

        // Vérification de l'ID du controleur à supprimer
        $controleur = Controleur::find($id);

        if($controleur){
            //Suppression du controleur
            Controleur::find($id)->delete();
            return redirect("/controleur/index")->with("success_msg","Controleur supprimé avec succès");
        }
        else{
            return redirect("/controleur/index");
        }

    }

    // fonction de génération du code abonné
//    private function generateCode(){
//
//        $code = "A";
//
//        $lastID = "".(Abonne::all()->last()->id + 1);
//
//        while(strlen($lastID) < 5){
//            $lastID = "0".$lastID;
//
//        }
//        $code = $code.$lastID;
//
//        return $code;
//    }
}
