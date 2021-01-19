<div class="form-group {{ $errors->has('nom') ? 'has-error' : ''}}">
    <label for="nom" class="control-label">{{ 'Nom' }}</label>
    <input class="form-control" name="nom" type="date" id="nom" value="{{ isset($stage->nom) ? $stage->nom : ''}}" required>
    {!! $errors->first('nom', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('date_fin') ? 'has-error' : ''}}">
    <label for="date_fin" class="control-label">{{ 'Date Fin' }}</label>
    <input class="form-control" name="date_fin" type="date" id="date_fin" value="{{ isset($stage->date_fin) ? $stage->date_fin : ''}}" required>
    {!! $errors->first('date_fin', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('date_debut') ? 'has-error' : ''}}">
    <label for="date_debut" class="control-label">{{ 'Date Debut' }}</label>
    <input class="form-control" name="date_debut" type="date" id="date_debut" value="{{ isset($stage->date_debut) ? $stage->date_debut : ''}}" required>
    {!! $errors->first('date_debut', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('fichier_join') ? 'has-error' : ''}}">
    <label for="fichier_join" class="control-label">{{ 'Fichier Join' }}</label>
    <input class="form-control" name="fichier_join" type="file" id="fichier_join" value="{{ isset($stage->fichier_join) ? $stage->fichier_join : ''}}" >
    {!! $errors->first('fichier_join', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('portee') ? 'has-error' : ''}}">
    <label for="portee" class="control-label">{{ 'Portee' }}</label>
    <select name="portee" class="form-control" id="portee" required>
    @foreach (json_decode('{"INFINI":"INFINI","ANNUELLE":"ANNUELLE"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($stage->portee) && $stage->portee == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('portee', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('entreprise') ? 'has-error' : ''}}">
    <label for="entreprise" class="control-label">{{ 'Entreprise' }}</label>
    <input class="form-control" name="entreprise" type="number" id="entreprise" value="{{ isset($stage->entreprise) ? $stage->entreprise : ''}}" required>
    {!! $errors->first('entreprise', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="center">
    <input class="btn btn-primary col-md-6" type="submit" value="{{ $formMode === 'edit' ? 'Modifier' : 'Ajouter' }}">
</div>
