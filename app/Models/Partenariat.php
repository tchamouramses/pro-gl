<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partenariat extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'partenariats';

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
    protected $fillable = ['date_debut', 'duree', 'date_signature', 'entreprise', 'etablissement'];

    
}
