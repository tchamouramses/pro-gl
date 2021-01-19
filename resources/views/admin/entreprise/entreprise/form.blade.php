<div class="form-group {{ $errors->has('nom') ? 'has-error' : ''}}">
    <label for="nom" class="control-label">{{ 'Nom' }}</label>
    <input class="form-control" name="nom" type="text" id="nom" value="{{ isset($entreprise->nom) ? $entreprise->nom : ''}}" required>
    {!! $errors->first('nom', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('adresse') ? 'has-error' : ''}}">
    <label for="adresse" class="control-label">{{ 'Adresse' }}</label>
    <input class="form-control" name="adresse" type="text" id="adresse" value="{{ isset($entreprise->adresse) ? $entreprise->adresse : ''}}" required>
    {!! $errors->first('adresse', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('tel_entreprise') ? 'has-error' : ''}}">
    <label for="tel_entreprise" class="control-label">{{ 'Tel Entreprise' }}</label>
    <input class="form-control" name="tel_entreprise" type="text" id="tel_entreprise" value="{{ isset($entreprise->tel_entreprise) ? $entreprise->tel_entreprise : ''}}" required>
    {!! $errors->first('tel_entreprise', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('responsable') ? 'has-error' : ''}}">
    <label for="responsable" class="control-label">{{ 'Responsable' }}</label>
    <input class="form-control" name="responsable" type="text" id="responsable" value="{{ isset($entreprise->responsable) ? $entreprise->responsable : ''}}" required>
    {!! $errors->first('responsable', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('ville') ? 'has-error' : ''}}">
    <label for="ville" class="control-label">{{ 'Ville' }}</label>
    <input class="form-control" name="ville" type="text" id="ville" value="{{ isset($entreprise->ville) ? $entreprise->ville : ''}}" required>
    {!! $errors->first('ville', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('logo') ? 'has-error' : ''}}">
    <label for="logo" class="control-label">{{ 'Logo' }}</label>
    <input class="form-control" name="logo" type="file" id="logo" value="{{ isset($entreprise->logo) ? $entreprise->logo : ''}}" >
    {!! $errors->first('logo', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('pays') ? 'has-error' : ''}}">
    <label for="pays" class="control-label">{{ 'Pays' }}</label>
    <input class="form-control" name="pays" type="text" id="pays" value="{{ isset($entreprise->pays) ? $entreprise->pays : ''}}" required>
    {!! $errors->first('pays', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('administrateur') ? 'has-error' : ''}}">
    <label for="administrateur" class="control-label">{{ 'Administrateur' }}</label>
    <select class="select2 select2-success form-control" data-dropdown-css-class="select2-success" name="administrateur" required>
        @foreach($user as $item)
            <option value="{{$item->id}}" @if(isset($etablissement->administrateur) && $etablissement->administrateur === $item->id ) selected @endif>{{$item->name}} 
            </option>
        @endforeach
    </select>
    {!! $errors->first('administrateur', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="center">
    <input class="btn btn-primary col-md-6" type="submit" value="{{ $formMode === 'edit' ? 'Modifier' : 'Ajouter' }}">
</div>
