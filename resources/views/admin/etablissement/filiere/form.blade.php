<div class="form-group {{ $errors->has('nom') ? 'has-error' : ''}}">
    <label for="nom" class="control-label">{{ 'Nom' }}</label>
    <input class="form-control" name="nom" type="text" id="nom" value="{{ isset($filiere->nom) ? $filiere->nom : ''}}" required>
    {!! $errors->first('nom', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('etablissement') ? 'has-error' : ''}}">
    <label for="etablissement" class="control-label">{{ 'Etablissement' }}</label>
    <input class="form-control" name="etablissement" type="number" id="etablissement" value="{{ isset($filiere->etablissement) ? $filiere->etablissement : ''}}" >
    {!! $errors->first('etablissement', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="center">
    <input class="btn btn-primary col-md-6" type="submit" value="{{ $formMode === 'edit' ? 'Modifier' : 'Ajouter' }}">
</div>
