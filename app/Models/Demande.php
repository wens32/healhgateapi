<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/*(Jean-Baptiste ☻♠☺)

Le Model Demande
*/

class Demande extends Model
{
    use HasFactory;

    /* (Jean-Baptiste ☻♠☺)

    la méthode user(): 
    -qui permet au Model "Demande" d'appartenir à un seul Model "User" 
    */
    public function user()
    {
        return $this->hasOne(User::class);
    }

    /* (Jean-Baptiste ☻♠☺)

    la méthode publication(): 
    -qui permet au Model "Demande" d'appartenir à un seule Model "Publication" 
    */
    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }
}
