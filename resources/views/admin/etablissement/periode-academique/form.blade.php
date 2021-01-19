<div class="form-group {{ $errors->has('date_debut') ? 'has-error' : ''}}">
    <label for="date_debut" class="control-label">{{ 'Date Debut' }}</label>
    <input class="form-control" name="date_debut" type="date" id="date_debut" value="{{ isset($periodeacademique->date_debut) ? $periodeacademique->date_debut : ''}}" required>
    {!! $errors->first('date_debut', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('date_fin') ? 'has-error' : ''}}">
    <label for="date_fin" class="control-label">{{ 'Date Fin' }}</label>
    <input class="form-control" name="date_fin" type="date" id="date_fin" value="{{ isset($periodeacademique->date_fin) ? $periodeacademique->date_fin : ''}}" required>
    {!! $errors->first('date_fin', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('est_archive') ? 'has-error' : ''}}">
    <label for="est_archive" class="control-label">{{ 'Est Archive' }}</label>
    <div class="radio">
    <label><input name="est_archive" type="radio" value="1" {{ (isset($periodeacademique) && 1 == $periodeacademique->est_archive) ? 'checked' : '' }}> Yes</label>
</div>
<div class="radio">
    <label><input name="est_archive" type="radio" value="0" @if (isset($periodeacademique)) {{ (0 == $periodeacademique->est_archive) ? 'checked' : '' }} @else {{ 'checked' }} @endif> No</label>
</div>
    {!! $errors->first('est_archive', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('etablissement') ? 'has-error' : ''}}">
    <label for="etablissement" class="control-label">{{ 'Etablissement' }}</label>
    <input class="form-control" name="etablissement" type="number" id="etablissement" value="{{ isset($periodeacademique->etablissement) ? $periodeacademique->etablissement : ''}}" required>
    {!! $errors->first('etablissement', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="center">
    <input class="btn btn-primary col-md-6" type="submit" value="{{ $formMode === 'edit' ? 'Modifier' : 'Ajouter' }}">
</div>
