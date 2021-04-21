<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/* (Jean-Baptiste ☻♠☺)

    Model TypePage
    */

class TypePage extends Model
{
    use HasFactory;

    /* (Jean-Baptiste ☻♠☺)

    la méthode pages(): 
    -qui permet au Model "TypePage" d'appartenir à plusieurs Model "Page" 
    */
    public function pages()
    {
        return $this->hasMany(Page::class);
    }
}
