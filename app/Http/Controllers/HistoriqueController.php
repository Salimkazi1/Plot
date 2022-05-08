<?php
/**
 * Created by PhpStorm.
 * User: moi
 * Date: 09/05/2019
 * Time: 13:34
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Historique;



class HistoriqueController extends Controller
{
    public function  index(){

    }

    public function afficher($code)
    {

        $historiques = Historique::join('abonnes', 'abonnes.code', '=', 'historique.code')->where('historique.code', "=",$code)->get();

        if($historiques){
            return view('historique.index', compact("historiques"));
        }
        else{
            return redirect("/abonne/index");
        }
    }
}