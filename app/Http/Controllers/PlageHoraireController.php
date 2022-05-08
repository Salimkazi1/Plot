<?php
/**
 * Created by PhpStorm.
 * User: moi
 * Date: 12/05/2019
 * Time: 14:30
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;
use App\PlageHoraire;

class PlageHoraireController extends Controller
{
    public function index()
    {
        $plagehoraire = PlageHoraire::all();
        return view('plagehoraire.index', compact("plagehoraire"));
    }

    public function create(){

        return view('plagehoraire.ajouter');
    }

    public function store(Request $request)
    {
        $excedant=0;
        $type_plage = $request->input("navbarSelected");
        $radioSelected = $request->input("TradioSelected");
        $fin = $request->input("fin");
        $libelle_plage_horaire = $request->input("libelle");
        if($radioSelected=="radiofixe")
        {
            $debut = $request->input("debut");
        }
        else{
            $debut = $request->input("heure_apartir");
            $fin="24:00";
            $excedant=1;
        }


        if($debut==null)
        {
            $debut="00:00";
        }
        if($fin==null)
        {
            $fin="00:00";
        }
        $tarifSupp = $request->input("tarif_supp");
        $tarifPlusQue = $request->input("tarif_plus_que");
        $tarifJour = $request->input("tarif_jour");
        $tarifFixe = $request->input("tarifFixe");
//dd($debut,$fin,$excedant,$type_plage,$radioSelected);


        $existLibelle = PlageHoraire::where("libelle_plage_horaire", "=", $libelle_plage_horaire)->count();
        $existeDate = PlageHoraire::where("heure_debut", "=", $debut)->where("heure_fin", "=", $fin)->where("type_plage","=",$type_plage)->where("excedant", "=", $excedant)->count();
//        dd($existeDate,$existLibelle);
        if($existLibelle>0)
        {
            return redirect("/plagehoraire/ajouter")->withInput()->with("error_msg","Cette libellé existe déjà");
        }

        else if($existeDate>0)
        {
            return redirect("/plagehoraire/ajouter")->withInput()->with("error_msg","Les dates début et fin existent déjà!");
        }
        else
        {

            if($type_plage=='j')
            {
                $existeType = PlageHoraire::where("type_plage", "=", $type_plage)->count();
                if($existeType>0)
                {
                    return redirect("/plagehoraire/ajouter")->withInput()->with("error_msg","Le tarif pour jour existe déjà");
                }
                else
                {
                    $excedant=0;
                    //creation d'instance d'une plage horaire
                    $newPlage = new PlageHoraire();


                    $newPlage->libelle_plage_horaire = $libelle_plage_horaire;
                    $newPlage->heure_debut = $debut;

                    $newPlage->heure_fin = $fin;
                    $newPlage->tarif = $tarifJour;
                    $newPlage->excedant = $excedant;
                    $newPlage->tarif_supp = $tarifSupp;
                    $newPlage->type_plage = $type_plage;


                    //ajout dans la base de données
                    $newPlage->save();


                    return redirect("/plagehoraire/index")->with("success_msg","Plage horaire ajouté avec succès");
                }
            }
            else
            {
                if($radioSelected=="radiofixe")
                {
                    $excedant=0;
                    //creation d'instance d'une plage horaire
                    $newPlage = new PlageHoraire();

                    $newPlage->libelle_plage_horaire = $libelle_plage_horaire;
                    $newPlage->heure_debut = $debut;
                    $newPlage->heure_fin = $fin;
                    $newPlage->tarif = $tarifFixe;
                    $newPlage->excedant = $excedant;
                    $newPlage->tarif_supp = $tarifSupp;
                    $newPlage->type_plage = $type_plage;


                    //ajout dans la base de données
                    $newPlage->save();

                }
                else
                {
                    $excedant= 1;
                    //creation d'instance d'une plage horaire
                    $newPlage = new PlageHoraire();

                    $newPlage->libelle_plage_horaire = $libelle_plage_horaire;
                    $newPlage->heure_debut = $debut;
                    $newPlage->heure_fin = $fin;
                    $newPlage->tarif = $tarifPlusQue;
                    $newPlage->excedant = $excedant;
                    $newPlage->tarif_supp = $tarifSupp;
                    $newPlage->type_plage = $type_plage;


                    //ajout dans la base de données
                    $newPlage->save();
                }


                return redirect("/plagehoraire/index")->with("success_msg","Plage horaire ajouté avec succès");
            }

        }

    }

}