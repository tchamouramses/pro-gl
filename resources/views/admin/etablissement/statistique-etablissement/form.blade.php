<div class="form-group {{ $errors->has('nb_postuler') ? 'has-error' : ''}}">
    <label for="nb_postuler" class="control-label">{{ 'Nb Postuler' }}</label>
    <input class="form-control" name="nb_postuler" type="number" id="nb_postuler" value="{{ isset($statistiqueetablissement->nb_postuler) ? $statistiqueetablissement->nb_postuler : ''}}" required>
    {!! $errors->first('nb_postuler', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('taux_reussite_examen') ? 'has-error' : ''}}">
    <label for="taux_reussite_examen" class="control-label">{{ 'Taux Reussite Examen' }}</label>
    <input class="form-control" name="taux_reussite_examen" type="number" id="taux_reussite_examen" value="{{ isset($statistiqueetablissement->taux_reussite_examen) ? $statistiqueetablissement->taux_reussite_examen : ''}}" required>
    {!! $errors->first('taux_reussite_examen', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nb_diplome_annuelle') ? 'has-error' : ''}}">
    <label for="nb_diplome_annuelle" class="control-label">{{ 'Nb Diplome Annuelle' }}</label>
    <input class="form-control" name="nb_diplome_annuelle" type="number" id="nb_diplome_annuelle" value="{{ isset($statistiqueetablissement->nb_diplome_annuelle) ? $statistiqueetablissement->nb_diplome_annuelle : ''}}" required>
    {!! $errors->first('nb_diplome_annuelle', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nb_etudiant_affilier') ? 'has-error' : ''}}">
    <label for="nb_etudiant_affilier" class="control-label">{{ 'Nb Etudiant Affilier' }}</label>
    <input class="form-control" name="nb_etudiant_affilier" type="number" id="nb_etudiant_affilier" value="{{ isset($statistiqueetablissement->nb_etudiant_affilier) ? $statistiqueetablissement->nb_etudiant_affilier : ''}}" required>
    {!! $errors->first('nb_etudiant_affilier', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nb_entreprise_part') ? 'has-error' : ''}}">
    <label for="nb_entreprise_part" class="control-label">{{ 'Nb Entreprise Part' }}</label>
    <input class="form-control" name="nb_entreprise_part" type="number" id="nb_entreprise_part" value="{{ isset($statistiqueetablissement->nb_entreprise_part) ? $statistiqueetablissement->nb_entreprise_part : ''}}" required>
    {!! $errors->first('nb_entreprise_part', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('nb_stage_recus') ? 'has-error' : ''}}">
    <label for="nb_stage_recus" class="control-label">{{ 'Nb Stage Recus' }}</label>
    <input class="form-control" name="nb_stage_recus" type="number" id="nb_stage_recus" value="{{ isset($statistiqueetablissement->nb_stage_recus) ? $statistiqueetablissement->nb_stage_recus : ''}}" required>
    {!! $errors->first('nb_stage_recus', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('f_m_j_programme') ? 'has-error' : ''}}">
    <label for="f_m_j_programme" class="control-label">{{ 'F M J Programme' }}</label>
    <input class="form-control" name="f_m_j_programme" type="number" id="f_m_j_programme" value="{{ isset($statistiqueetablissement->f_m_j_programme) ? $statistiqueetablissement->f_m_j_programme : ''}}" required>
    {!! $errors->first('f_m_j_programme', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('etablissement') ? 'has-error' : ''}}">
    <label for="etablissement" class="control-label">{{ 'Etablissement' }}</label>
    <input class="form-control" name="etablissement" type="number" id="etablissement" value="{{ isset($statistiqueetablissement->etablissement) ? $statistiqueetablissement->etablissement : ''}}" >
    {!! $errors->first('etablissement', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="center">
    <input class="btn btn-primary col-md-6" type="submit" value="{{ $formMode === 'edit' ? 'Modifier' : 'Ajouter' }}">
</div>
