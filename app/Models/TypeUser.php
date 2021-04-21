<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/* (Jean-Baptiste ☻♠☺)

Model TypeUser
*/

class TypeUser extends Model
{
    use HasFactory;

    /* (Jean-Baptiste ☻♠☺)

    la méthode users(): 
    -qui permet au Model "TypeUser" d'appartenir à plusieurs Model "User" 
    */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
