<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donnee extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'donnees';

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
    protected $fillable = ['date', 'valeur', 'performance', 'type_perf', 'type_val', 'description', 'etudiant', 'categorie'];

    
}
