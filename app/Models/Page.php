<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/* (Jean-Baptiste ☻♠☺)

    model Page
    */

class Page extends Model
{
    use HasFactory;

    /* (Jean-Baptiste ☻♠☺)

    la méthode user(): 
    -qui permet au Model "Page" d'appartenir à un seule Model "User" 
    */
    public function user()
    {
        return $this->hasOne(User::class);
    }

    /* (Jean-Baptiste ☻♠☺)

    la méthode offres(): 
    -qui permet au Model "Page" de génerer plusieurs Model "Offre" 
    */
    public function offres()
    {
        return $this->hasMany(Offre::class);
    }

    /*(Jean-Baptiste ☻♠☺)

    la méthode typePage(): 
    -qui permet au Model "Page" d'appartenir à un seule Model "TypePage"
    */
    public function typePage()
    {
        return $this->hasOne(TypePage::class);
    }
}
