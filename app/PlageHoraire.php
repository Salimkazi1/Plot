<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlageHoraire extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'plagehoraire';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['libelle_plage_horaire', 'heure_debut', 'heure_fin', 'tarif', 'excedant', 'tarif_supp', 'type_plage'];


    public function getKeyName()
    {
        return "id";
    }

    public $timestamps = false;



}
