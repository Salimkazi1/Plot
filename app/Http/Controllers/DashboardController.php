<?php

namespace App\Http\Controllers;

use App\Controleur;
use Session;
use App\Http\Requests;
use App\User;
use App\Abonne;

class DashboardController extends Controller
{

    public function index()
    {
        $countUser = User::all()->count();
        $countAbonne = Abonne::all()->count();
        $countControleur = Controleur::all()->count();
        
        return view('dashboard.index', compact('countUser','countAbonne', 'countControleur'));
    }

}
