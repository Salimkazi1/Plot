<?php

namespace App\Http\Controllers;

use App\PlageAbonne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Abonne;
use Carbon\Carbon;


class AbonneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Fonction d'affichage de la liste des abonnés
    public function index()
    {

        //
        $abonnes = Abonne::all();

        return view("abonne/index", compact("abonnes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //fonction pour afficher le formulaire d'ajout d'un abonné
    public function create()
    {
        $today = date('m/d/Y h:i:s ', time());
        //Carbon::now()->dayOfWeek;

        return view("abonne/ajouter", compact('today'));
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

        $nom = $request->input("nom");
        $prenom = $request->input("prenom");
        $telephone = $request->input("telephone");
        $email = $request->input("email");
        $date_debut = $request->input("date_debut");
        $date_fin = $request->input("date_fin");
        $code = $request->input("code");

        // __________________ plage abbonne___________________
        $heure_debut_samedi=$request->input("debutSamedi");
        $heure_fin_samedi=$request->input("finSamedi");
        $accesSamedi=$request->input("NSamedi");

        $heure_debut_dimanche=$request->input("debutDimanche");
        $heure_fin_dimanche=$request->input("finDimanche");
        $accesDimanche=$request->input("NDimanche");

        $heure_debut_lundi=$request->input("debutLundi");
        $heure_fin_lundi=$request->input("finLundi");
        $accesLundi=$request->input("NLundi");

        $heure_debut_mardi=$request->input("debutMardi");
        $heure_fin_mardi=$request->input("finMardi");
        $accesMardi=$request->input("NMardi");

        $heure_debut_mercredi=$request->input("debutMercredi");
        $heure_fin_mercredi=$request->input("finMercredi");
        $accesMercredi=$request->input("NMercredi");

        $heure_debut_jeudi=$request->input("debutJeudi");
        $heure_fin_jeudi=$request->input("finJeudi");
        $accesJeudi=$request->input("NJeudi");

        $heure_debut_vendredi=$request->input("debutVendredi");
        $heure_fin_vendredi=$request->input("finVendredi");
        $accesVendredi=$request->input("NVendredi");
//        dd($accesSamedi,$accesDimanche,$accesLundi,$accesMardi,$accesMercredi,$accesJeudi,$accesVendredi);

        //Test pour savoir si la date fin est inférieur à la date début
        if($date_fin < $date_debut){
            return redirect("/abonne/ajouter")->withInput()->with("error_msg","La date fin doit être strictement supérieur à la date début");
        }


        //Vérification l'existance de l'email
        $existEmail = Abonne::where("email","=",$email)->first();


        if(!$existEmail){

                //creation d'instance d'un Abonné
                $newAbonne = new Abonne();


                $newAbonne->code = $code;
                $newAbonne->nom = $nom;
                $newAbonne->prenom = $prenom;
                $newAbonne->telephone = $telephone;
                $newAbonne->email = $email;
                $newAbonne->date_debut = $date_debut;
                $newAbonne->date_fin = $date_fin;

                //ajout dans la base de données
                $newAbonne->save();
                $idAbonne=$newAbonne->id;

                for ($i = 0; $i < 7; $i++)
                {

                    switch ($i)
                    {
                        case '0':
                            $newPlage = new PlageAbonne();
                            $newPlage->jour=$i;
                            $newPlage->acces=$accesDimanche;
                            $newPlage->heure_debut=$heure_debut_dimanche;
                            $newPlage->heure_fin=$heure_fin_dimanche;
                            $newPlage->id_abonne=$idAbonne;

                            $newPlage->save();
                        break;

                        case '1':
                            $newPlage = new PlageAbonne();
                            $newPlage->jour=$i;
                            $newPlage->acces=$accesLundi;
                            $newPlage->heure_debut=$heure_debut_lundi;
                            $newPlage->heure_fin=$heure_fin_lundi;
                            $newPlage->id_abonne=$idAbonne;

                            $newPlage->save();
                            break;
                        case '2':
                            $newPlage = new PlageAbonne();
                            $newPlage->jour=$i;
                            $newPlage->acces=$accesMardi;
                            $newPlage->heure_debut=$heure_debut_mardi;
                            $newPlage->heure_fin=$heure_fin_mardi;
                            $newPlage->id_abonne=$idAbonne;

                            $newPlage->save();
                            break;
                        case '3':
                            $newPlage = new PlageAbonne();
                            $newPlage->jour=$i;
                            $newPlage->acces=$accesMercredi;
                            $newPlage->heure_debut=$heure_debut_mercredi;
                            $newPlage->heure_fin=$heure_fin_mercredi;
                            $newPlage->id_abonne=$idAbonne;

                            $newPlage->save();
                            break;
                        case '4':
                            $newPlage = new PlageAbonne();
                            $newPlage->jour=$i;
                            $newPlage->acces=$accesJeudi;
                            $newPlage->heure_debut=$heure_debut_jeudi;
                            $newPlage->heure_fin=$heure_fin_jeudi;
                            $newPlage->id_abonne=$idAbonne;

                            $newPlage->save();
                            break;
                        case '5':
                            $newPlage = new PlageAbonne();
                            $newPlage->jour=$i;
                            $newPlage->acces=$accesVendredi;
                            $newPlage->heure_debut=$heure_debut_vendredi;
                            $newPlage->heure_fin=$heure_fin_vendredi;
                            $newPlage->id_abonne=$idAbonne;

                            $newPlage->save();
                            break;
                        case '6':
                            $newPlage = new PlageAbonne();
                            $newPlage->jour=$i;
                            $newPlage->acces=$accesSamedi;
                            $newPlage->heure_debut=$heure_debut_samedi;
                            $newPlage->heure_fin=$heure_fin_samedi;
                            $newPlage->id_abonne=$idAbonne;

                            $newPlage->save();
                            break;
                    }


                }




                return redirect("/abonne/index")->with("success_msg","Abonné ajouté avec succès");
            }


        else {
            //message d'erreur email existe déjà dans la base de données
            return redirect("/abonne/ajouter")->withInput()->with("error_msg", "Cet email existe déjà");
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
        $abonne = Abonne::find($id);
        $plage = PlageAbonne::where("id_abonne", "=", $id)->get();
        //dd($id,$plage);
        if($abonne && $plage){
            return view('abonne.modifier', compact("abonne", "plage"));
        }
        else{
            return redirect("/abonne/index");
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
        //Récupération des informations de l'abonné de la base de données
        $abonne = Abonne::find($id);


//        $code = $request->input("code");
        $nom = $request->input("nom");
        $prenom = $request->input("prenom");
        $telephone = $request->input("telephone");
        $email = $request->input("email");
        $date_debut = $request->input("date_debut");
        $date_fin = $request->input("date_fin");
        $code = $request->input("code");

        // plage _______________________________

        $heure_debut_samedi=$request->input("debutSamedi");
        $heure_fin_samedi=$request->input("finSamedi");
        $accesSamedi=$request->input("NSamedi");

        $heure_debut_dimanche=$request->input("debutDimanche");
        $heure_fin_dimanche=$request->input("finDimanche");
        $accesDimanche=$request->input("NDimanche");

        $heure_debut_lundi=$request->input("debutLundi");
        $heure_fin_lundi=$request->input("finLundi");
        $accesLundi=$request->input("NLundi");

        $heure_debut_mardi=$request->input("debutMardi");
        $heure_fin_mardi=$request->input("finMardi");
        $accesMardi=$request->input("NMardi");

        $heure_debut_mercredi=$request->input("debutMercredi");
        $heure_fin_mercredi=$request->input("finMercredi");
        $accesMercredi=$request->input("NMercredi");

        $heure_debut_jeudi=$request->input("debutJeudi");
        $heure_fin_jeudi=$request->input("finJeudi");
        $accesJeudi=$request->input("NJeudi");

        $heure_debut_vendredi=$request->input("debutVendredi");
        $heure_fin_vendredi=$request->input("finVendredi");
        $accesVendredi=$request->input("NVendredi");
        //________________________________________

        //test sur la date fin (si c'est inférieur à la date début)
        if($date_fin < $date_debut){
            return redirect("/abonne/modifier/$id")->with("error_msg","la date fin doit être strictement inférieur à la date début");
        }


        //Vérification l'existance de l'email
        $existEmail = Abonne::where("email","=",$email)->where("id","!=",$id)->first();
        if(!$existEmail){


                $abonne->nom = $nom;
                $abonne->prenom = $prenom;
                $abonne->telephone = $telephone;
                $abonne->email = $email;
                $abonne->date_debut = $date_debut;
                $abonne->date_fin = $date_fin;
                $abonne->code = $code;

                //modification dans la base de données
                $abonne->update();

                //---------------- plage ------------


            for ($i = 0; $i < 7; $i++)
            {

                switch ($i)
                {
                    case '0':
                        $plageDimanche = PlageAbonne::where("jour","=",$i)->where("id_abonne","=",$id)->first();

                        $plageDimanche->acces=$accesDimanche;
                        $plageDimanche->heure_debut=$heure_debut_dimanche;
                        $plageDimanche->heure_fin=$heure_fin_dimanche;

                        $plageDimanche->update();
                        break;

                    case '1':
                        $plageLundi = PlageAbonne::where("jour","=",$i)->where("id_abonne","=",$id)->first();
                        $plageLundi->acces=$accesLundi;
                        $plageLundi->heure_debut=$heure_debut_lundi;
                        $plageLundi->heure_fin=$heure_fin_lundi;


                        $plageLundi->update();
                        break;
                    case '2':
                        $plageMardi = PlageAbonne::where("jour","=",$i)->where("id_abonne","=",$id)->first();
                        $plageMardi->acces=$accesMardi;
                        $plageMardi->heure_debut=$heure_debut_mardi;
                        $plageMardi->heure_fin=$heure_fin_mardi;


                        $plageMardi->update();
                        break;
                    case '3':
                        $plageMercredi = PlageAbonne::where("jour","=",$i)->where("id_abonne","=",$id)->first();

                        $plageMercredi->acces=$accesMercredi;
                        $plageMercredi->heure_debut=$heure_debut_mercredi;
                        $plageMercredi->heure_fin=$heure_fin_mercredi;


                        $plageMercredi->update();
                        break;
                    case '4':
                        $plageJeudi = PlageAbonne::where("jour","=",$i)->where("id_abonne","=",$id)->first();

                        $plageJeudi->acces=$accesJeudi;
                        $plageJeudi->heure_debut=$heure_debut_jeudi;
                        $plageJeudi->heure_fin=$heure_fin_jeudi;


                        $plageJeudi->update();
                        break;
                    case '5':
                        $plageVendredi = PlageAbonne::where("jour","=",$i)->where("id_abonne","=",$id)->first();

                        $plageVendredi->acces=$accesVendredi;
                        $plageVendredi->heure_debut=$heure_debut_vendredi;
                        $plageVendredi->heure_fin=$heure_fin_vendredi;


                        $plageVendredi->update();
                        break;
                    case '6':
                        $plageSamedi = PlageAbonne::where("jour","=",$i)->where("id_abonne","=",$id)->first();

                        $plageSamedi->acces=$accesSamedi;
                        $plageSamedi->heure_debut=$heure_debut_samedi;
                        $plageSamedi->heure_fin=$heure_fin_samedi;


                        $plageSamedi->update();
                        break;
                }


            }
                // -------------------------------------

                return redirect("/abonne/index")->with("success_msg","Abonné modifié avec succès");
            }


        else{
            //message d'erreur email existe déjà dans la base de données
            return redirect("/abonne/modifier/".$id)->withInput(Input::except('email'))->with("error_msg"," l'email existe déjà");
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

        // Vérification de l'ID de l'abonné à supprimer
        $abonne = Abonne::find($id);

        if($abonne){
            //Suppression d'abonné
            Abonne::find($id)->delete();
            return redirect("/abonne/index")->with("success_msg","Abonné supprimé avec succès");
        }
        else{
            return redirect("/abonne/index");
        }

    }

    // fonction de génération du code abonné
    private function generateCode(){

        $code = "A";

        $lastID = "".(Abonne::all()->count() + 1);

        while(strlen($lastID) < 5){
            $lastID = "0".$lastID;

        }
        $code = $code.$lastID;

        return $code;
    }
}
