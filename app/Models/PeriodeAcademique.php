<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeriodeAcademique extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'periode_academiques';

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
    protected $fillable = ['date_debut', 'date_fin', 'est_archive', 'etablissement'];

    
}
