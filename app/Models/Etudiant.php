<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'etudiants';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nom', 'prenom', 'date_nais', 'lieu_nais', 'matricule', 'utilisateur', 'niveau'];

    
}
