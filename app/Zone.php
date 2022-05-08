<?php
/**
 * Created by PhpStorm.
 * User: moi
 * Date: 20/08/2019
 * Time: 11:54
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zone extends Model
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
    protected $fillable = ['ID' ,'LIBELLE_NIVEAU', 'NB_PLACES_MAX', 'NB_PLACES_DISPO' ];


    public function getKeyName()
    {
        return "ID";
    }

    public $timestamps = false;


}