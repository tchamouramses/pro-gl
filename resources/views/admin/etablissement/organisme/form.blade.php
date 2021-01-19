<div class="form-group {{ $errors->has('nom') ? 'has-error' : ''}}">
    <label for="nom" class="control-label">{{ 'Nom' }}</label>
    <input class="form-control" name="nom" type="text" id="nom" value="{{ isset($organisme->nom) ? $organisme->nom : ''}}" required>
    {!! $errors->first('nom', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('ville') ? 'has-error' : ''}}">
    <label for="ville" class="control-label">{{ 'Ville' }}</label>
    <input class="form-control" name="ville" type="text" id="ville" value="{{ isset($organisme->ville) ? $organisme->ville : ''}}" required>
    {!! $errors->first('ville', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('adresse') ? 'has-error' : ''}}">
    <label for="adresse" class="control-label">{{ 'Adresse' }}</label>
    <input class="form-control" name="adresse" type="text" id="adresse" value="{{ isset($organisme->adresse) ? $organisme->adresse : ''}}" required>
    {!! $errors->first('adresse', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('responsable') ? 'has-error' : ''}}">
    <label for="responsable" class="control-label">{{ 'Responsable' }}</label>
    <input class="form-control" name="responsable" type="text" id="responsable" value="{{ isset($organisme->responsable) ? $organisme->responsable : ''}}" required>
    {!! $errors->first('responsable', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('logo') ? 'has-error' : ''}}">
    <label for="logo" class="control-label">{{ 'Logo' }}</label>
    <input class="form-control" name="logo" type="text" id="logo" value="{{ isset($organisme->logo) ? $organisme->logo : ''}}" required>
    {!! $errors->first('logo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('pays') ? 'has-error' : ''}}">
    <label for="pays" class="control-label">{{ 'Pays' }}</label>
    <input class="form-control" name="pays" type="text" id="pays" value="{{ isset($organisme->pays) ? $organisme->pays : ''}}" required>
    {!! $errors->first('pays', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('tel_entreprise') ? 'has-error' : ''}}">
    <label for="tel_entreprise" class="control-label">{{ 'Tel Entreprise' }}</label>
    <input class="form-control" name="tel_entreprise" type="text" id="tel_entreprise" value="{{ isset($organisme->tel_entreprise) ? $organisme->tel_entreprise : ''}}" required>
    {!! $errors->first('tel_entreprise', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="center">
    <input class="btn btn-primary col-md-6" type="submit" value="{{ $formMode === 'edit' ? 'Modifier' : 'Ajouter' }}">
</div>
