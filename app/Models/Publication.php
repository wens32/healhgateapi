<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/* (Jean-Baptiste ☻♠☺)

Model Publication
*/

class Publication extends Model
{
    use HasFactory;

    /* (Jean-Baptiste ☻♠☺)

    la méthode user(): 
    -qui permet au Model "Publication" d'appartenir à un seule Model "User" 
    */
    public function user()
    {
        return $this->hasOne(User::class);
    }

    /* (Jean-Baptiste ☻♠☺)

    la méthode offres(): 
    -qui permet au Model "Publication" de contenir plusieurs Model "Offre" 
    */
    public function offres()
    {
        return $this->hasMany(Offre::class);
    }

    /* (Jean-Baptiste ☻♠☺)

    la méthode demandes(): 
    -qui permet au Model "Publication" de contenir plusieurs Model "Demande" 
    */
    public function demandes()
    {
        return $this->hasMany(Demande::class);
    }

    /* (Jean-Baptiste ☻♠☺)

    la méthode commentaires(): 
    -qui permet au Model "Publication" d'avoir plusieurs Model "Commentaire" 
    */
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }
}
