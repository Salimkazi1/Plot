<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlageAbonne extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'plageabonne';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['jour', 'heure_debut', 'heure_fin', 'acces', 'id_abonne'];


    public function getKeyName()
    {
        return "id";
    }

    public $timestamps = false;
    public function Abonne()
    {
        return $this->belongsTo("App\Abonne","id_abonne", "id");
    }




}
