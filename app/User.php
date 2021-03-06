<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class User extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nom', 'prenom', 'telephone', 'email', 'login', 'password', 'idProfil'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function getKeyName()
    {
        return "id";
    }

    public $timestamps = false;
}
