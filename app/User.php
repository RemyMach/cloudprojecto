<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','birthday','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     * ce qui ne s'affiche dans un json quand on fait un return d'un user
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     * conversion de la clé, l'attribut correspondant dans le type qu'il a en valeur
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * renvoie tout les commentaire fait pas notre user
     *
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
