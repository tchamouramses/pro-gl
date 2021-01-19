<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatistiqueEtablissement extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'statistique_etablissements';

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
    protected $fillable = ['nb_postuler', 'taux_reussite_examen', 'nb_diplome_annuelle', 'nb_etudiant_affilier', 'nb_entreprise_part', 'nb_stage_recus', 'f_m_j_programme', 'etablissement'];

    
}
