<div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
    <label for="date" class="control-label">{{ 'Date' }}</label>
    <input class="form-control" name="date" type="date" id="date" value="{{ isset($donnee->date) ? $donnee->date : ''}}" required>
    {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('valeur') ? 'has-error' : ''}}">
    <label for="valeur" class="control-label">{{ 'Valeur' }}</label>
    <input class="form-control" name="valeur" type="text" id="valeur" value="{{ isset($donnee->valeur) ? $donnee->valeur : ''}}" required>
    {!! $errors->first('valeur', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('performance') ? 'has-error' : ''}}">
    <label for="performance" class="control-label">{{ 'Performance' }}</label>
    <input class="form-control" name="performance" type="number" id="performance" value="{{ isset($donnee->performance) ? $donnee->performance : ''}}" required>
    {!! $errors->first('performance', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('type_perf') ? 'has-error' : ''}}">
    <label for="type_perf" class="control-label">{{ 'Type Perf' }}</label>
    <select name="type_perf" class="form-control" id="type_perf" required>
    @foreach (json_decode('{"ETOILE":"ETOILE","NOMBRE":"NOMBRE"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($donnee->type_perf) && $donnee->type_perf == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('type_perf', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('type_val') ? 'has-error' : ''}}">
    <label for="type_val" class="control-label">{{ 'Type Val' }}</label>
    <select name="type_val" class="form-control" id="type_val" required>
    @foreach (json_decode('{"CHAINE":"CHAINE","FICHIER":"FICHIER"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($donnee->type_val) && $donnee->type_val == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('type_val', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Description' }}</label>
    <input class="form-control" name="description" type="text" id="description" value="{{ isset($donnee->description) ? $donnee->description : ''}}" required>
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('etudiant') ? 'has-error' : ''}}">
    <label for="etudiant" class="control-label">{{ 'Etudiant' }}</label>
    <input class="form-control" name="etudiant" type="number" id="etudiant" value="{{ isset($donnee->etudiant) ? $donnee->etudiant : ''}}" required>
    {!! $errors->first('etudiant', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('categorie') ? 'has-error' : ''}}">
    <label for="categorie" class="control-label">{{ 'Categorie' }}</label>
    <input class="form-control" name="categorie" type="number" id="categorie" value="{{ isset($donnee->categorie) ? $donnee->categorie : ''}}" required>
    {!! $errors->first('categorie', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="center">
    <input class="btn btn-primary col-md-6" type="submit" value="{{ $formMode === 'edit' ? 'Modifier' : 'Ajouter' }}">
</div>
