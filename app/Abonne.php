<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abonne extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'abonnes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nom', 'prenom', 'telephone', 'email', 'date_debut', 'date_fin', 'code'];


    public function getKeyName()
    {
        return "id";
    }

    public $timestamps = false;

    public function Historique(){

        return $this->hasMany("App\Historique","code", "id");
    }

    public function PlageAbonne(){
        return $this->hasMany("App\PlageHoraire","id_abonne", "id");
    }

}
