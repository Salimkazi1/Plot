<?php
/**
 * Created by PhpStorm.
 * User: moi
 * Date: 10/04/2019
 * Time: 12:37
 */

namespace App;
use Illuminate\Database\Eloquent\Model;


class Niveau extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'niveau';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['NUM_NIVEAU', 'LIBELLE_NIVEAU', 'NB_PLACES_MAX', 'NB_PLACES_DISPO'];


    public function getKeyName()
    {
        return "ID";
    }

    public $timestamps = false;

    public function Controleurs(){

        return $this->hasMany("App\Controleur", "id_niveau", "ID");
    }
}


