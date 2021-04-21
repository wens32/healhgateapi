<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/* (Jean-Baptiste ☻♠☺)

    Model Offre
*/

class Offre extends Model
{
    use HasFactory;

    /* (Jean-Baptiste ☻♠☺)

    la méthode page(): 
    -qui permet au Model "Offre" d'appartenir à un seule Model "Page" 
    */
    public function page()
    {
        return $this->hasOne(Page::class);
    }

    /* (Jean-Baptiste ☻♠☺)

    la méthode users(): 
    -qui permet au Model "Offre" d'être postuler par plusieurs Model "User" 

    */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /* (Jean-Baptiste ☻♠☺)

    la méthode publication(): 
    -qui permet au Model "Offre" d'appartenir à un seule Model "Publication" 
    */
    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }
}
