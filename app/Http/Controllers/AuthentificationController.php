<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use App\User;

class AuthentificationController extends Controller
{

    public function index()
    {
        if (Session::has('SuserID')){
            //return redirect()->action('dashboardController@index');
            return redirect("/");
        }
        return view('auth.login');
    }

    public function login(Request $request){
        $login = $request->input("login");
        $password = $request->input("password");
        $password = md5($password);

        $user = User::where("login",'=',$login)->where("password","=",$password)->first();

        if($user){
            Session::put('SuserID', $user->id);
            Session::put('SuserName', $user->nom." ".$user->prenom);
            Session::put('SprofilID', $user->idProfil);
            return redirect("/");
        }
        else{
            return redirect()->action('AuthentificationController@index')->with('message','Mot de passe ou identifiant incorrect');
        }
    }

    public function logout(){
        Session::flush();
        return redirect()->action('AuthentificationController@index');
    }


}
