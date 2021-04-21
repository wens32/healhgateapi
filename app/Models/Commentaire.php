<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/* (Jean-Baptiste ☻♠☺)

Model commentaire
*/

class Commentaire extends Model
{
    use HasFactory;

    /* (Jean-Baptiste ☻♠☺)

    la méthode publication(): 
    -qui permet au Model "Commentaire" d'appartenir à un seule Model "Publication" 
    */
    public function publication()
    {
        return $this->hasOne(Publication::class);
    }


    /* (Jean-Baptiste ☻♠☺)

    la méthode user(): 
    -qui permet au Model "Commentaire" d'appartenir à un seule Model "User" 
    */
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
