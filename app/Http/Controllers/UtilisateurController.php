<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Session;
use App\User;

//Contrôleur Utilisateur
class UtilisateurController extends Controller
{
    //Fonction pour afficher la liste des utilisateurs
    public function index()
    {
        $users = User::all();
        return view('utilisateur.index', compact("users"));
    }

    //Fonction pour afficher le formulaire d'ajout d'un utilisateur
    public function create(){
        
        return view('utilisateur.ajouter');
    }

    //Fonction pour ajouter un utilisateur dans la base de données
    public function store(Request $request){

        //Récupération des inputs
        $nom = $request->input("nom");
        $prenom = $request->input("prenom");
        $telephone = $request->input("telephone");
        $email = $request->input("email");
        $login = $request->input("login");
        $password = md5($request->input("password"));
        $profil = $request->input("profil");

        //Vérification l'existance de l'email
        $existEmail = User::where("email","=",$email)->first();


        if(!$existEmail){

            //Vérification l'existance de login / mot de passe
            $existLoginPassword = User::where("login","=",$login)->where("password","=",$password)->first();
            if(!$existLoginPassword){
                //creation d'instance de USER
                $newUser = new User();

                $newUser->nom = $nom;
                $newUser->prenom = $prenom;
                $newUser->telephone = $telephone;
                $newUser->email = $email;
                $newUser->login = $login;
                $newUser->password = $password;
                $newUser->idProfil = $profil;

                //ajout dans la base de données
                $newUser->save();

                return redirect("/utilisateur/index")->with("success_msg","Utilisateur ajouté avec succès");
            }
            else{
                //message d'erreur login / mot de passe existe déjà dans la base de données
                return redirect("/utilisateur/ajouter")->withInput(Input::except('password'))->with("error_msg","Idantifiant / mot de passe existe déjà");
            }
        }
        else{
            //message d'erreur email existe déjà dans la base de données
            return redirect("/utilisateur/ajouter")->withInput(Input::except('password'))->with("error_msg","Email existe déjà");
        }
    }

    //Fonction pour afficher le formulaire de modification d'un utilisateur
    public function edite($id){
        $user = User::find($id);
        if($user){
            return view('utilisateur.modifier', compact("user"));
        }
        else{
            return redirect("/utilisateur/index");
        }
    }

    //Fonction pour mettre à jour un utilisateur
    public function update(Request $request, $id){

        //Récupération des informations de l'utilisateur de la base de données
        $user = User::find($id);

        $nom = $request->input("nom");
        $prenom = $request->input("prenom");
        $telephone = $request->input("telephone");
        $email = $request->input("email");
        $login = $request->input("login");
        $password = $request->input("password");
        $profil = $request->input("profil");

        //Vérification l'existance de l'email
        $existEmail = User::where("email","=",$email)->where("id","!=",$id)->first();
        if(!$existEmail){
            //Vérification l'existance de login / mot de passe
            if($password){
                $password = md5($password);
            }
            else{
                $password = $user->password;
            }

            $existLoginPassword = User::where("login","=",$login)->where("password","=",$password)->where("id","!=",$id)->first();

            if(!$existLoginPassword){
                if($profil != 1){
                    //Traitement du dernier profil administrateur
                    $count = User::where("idProfil","=",1)->where("id","!=",$id)->count();
                    if($count == 0){
                        return redirect("/utilisateur/modifier/".$id)->withInput(Input::except('password'))->with("error_msg","Vous ne pouvez pas modifier le profil de cet utilisateur car il faut au moins un utilisateur Administrateur ");
                    }
                }
                $user->nom = $nom;
                $user->prenom = $prenom;
                $user->telephone = $telephone;
                $user->email = $email;
                $user->login = $login;
                $user->password = $password;
                $user->idProfil = $profil;

                //modification dans la base de données
                $user->update();

                return redirect("/utilisateur/index")->with("success_msg","Utilisateur modifié avec succès");
            }
            else{
                //message d'erreur login / mot de passe existe déjà dans la base de données
                return redirect("/utilisateur/modifier/".$id)->withInput(Input::except('password'))->with("error_msg","Idantifiant / mot de passe existe déjà");
            }
        }
        else{
            //message d'erreur email existe déjà dans la base de données
            return redirect("/utilisateur/modifier/".$id)->withInput(Input::except('password'))->with("error_msg","Email existe déjà");
        }
    }

    public function delete(Request $request){
        $id = $request->input("id");

        //On vérifier si c'est le dernier utilisateur avec le profil " admin "
        $count = User::where("idProfil","=",1)->where("id","!=",$id)->count();
        if($count > 0){
            User::find($id)->delete();
            return redirect("/utilisateur/index")->with("success_msg","Utilisateur supprimé avec succès");
        }
        else{
            return redirect("/utilisateur/index")->with("error_msg","Vous ne pouvez pas supprimer cet utilisateur car il faut au moins un utilisateur Administrateur ");
        }
    }
}
