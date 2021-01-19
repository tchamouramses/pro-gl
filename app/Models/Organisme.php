<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organisme extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'organismes';

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
    protected $fillable = ['nom', 'ville', 'adresse', 'responsable', 'logo', 'pays', 'tel_entreprise'];

    
}
