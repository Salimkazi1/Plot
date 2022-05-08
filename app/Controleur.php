<?php
/**
 * Created by PhpStorm.
 * User: moi
 * Date: 09/04/2019
 * Time: 11:48
 */

namespace App;
use Illuminate\Database\Eloquent\Model;


class Controleur extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'controleurs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['adresse_ip', 'type', 'id_niveau'];


    public function getKeyName()
    {
        return "id";
    }

    public $timestamps = false;

    public function Niveau(){

        return $this->belongsTo("App\Niveau","id_niveau", "ID");
    }
}