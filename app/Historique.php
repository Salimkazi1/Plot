<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historique extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'historique';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code', 'statut', 'date_scan', 'type_scan'];


    public function getKeyName()
    {
        return "id";
    }

    public $timestamps = false;
    public function Abonne(){

        return $this->belongsTo("App\Abonne","code", "id");
    }
}
