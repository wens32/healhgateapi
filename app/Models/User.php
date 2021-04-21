<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/* (Jean-Baptiste ☻♠☺)

Model User
*/

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    /*(Jean-Baptiste ☻♠☺)
    
    Utilisation de 
    -$fillable: pour faire passer ces variables dans la base de donnée
    */

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nameUser',
        'emailUser',
        'passwordUser',
        'typeUser_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'passwordUser',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /* (Jean-Baptiste ☻♠☺)

    la méthode offres(): 
    -qui permet au Model "User" de postuler à plusieurs Model "Offre" 
    -le Model "Offre" peut être aussi postuler par plusieurs Model "User"

    Génère ainsi une association porteuse de propriété "users_offre" ayant comme clé étrangères :
    -"user_id"(référence à la clé primaire de User)
    -"offre_id"(référence à la clé primaire de Offre)
    */
    public function offres()
    {
        return $this->belongsToMany(Offre::class, 'users_offre', 'user_id', 'offre_id');
    }

    /*(Jean-Baptiste ☻♠☺)

     la méthode publications(): 
    -qui permet au Model "User" de réagir à plusieurs Model "Publication" 
    */
    public function publications()
    {
        return $this->hasMany(Publication::class);
    }

    /*(Jean-Baptiste ☻♠☺) 

     la méthode pages(): 
    -qui permet au Model "User" d'avoir plusieurs Model "Page" 
    */
    public function pages()
    {
        return $this->hasMany(Page::class);
    }

    /*(Jean-Baptiste ☻♠☺)

     la méthode demandes(): 
    -qui permet au Model "User" de faires plusieurs Model "Demande" 
    */
    public function demandes()
    {
        return $this->hasMany(Demande::class);
    }

    /*(Jean-Baptiste ☻♠☺)

     la méthode commentaires(): 
    -qui permet au Model "User" d'avoir plusieurs Model "Commentaire" 
    */
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }

    /*(Jean-Baptiste ☻♠☺)

     la méthode typeUser(): 
    -qui permet au Model "User" d'appartenir à un seule Model "TypeUser" 
    */
    public function typeUser()
    {
        return $this->hasOne(TypeUser::class);
    }
}
