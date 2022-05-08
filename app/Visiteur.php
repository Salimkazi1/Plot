<?php
/**
 * Created by PhpStorm.
 * User: moi
 * Date: 12/05/2019
 * Time: 14:28
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visiteur extends Model
{
    protected $table = 'visiteur';

    protected $fillable = ['code', 'date_entree', 'date_sortie'];

    public function getKeyName()
    {
        return "id";
    }

    public $timestamps = false;





}