<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'stages';

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
    protected $fillable = ['nom', 'date_fin', 'date_debut', 'fichier_join', 'portee', 'entreprise'];

    
}
