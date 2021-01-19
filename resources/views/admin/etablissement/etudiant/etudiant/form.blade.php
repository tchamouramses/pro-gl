<div class="form-group {{ $errors->has('nom') ? 'has-error' : ''}}">
    <label for="nom" class="control-label">{{ 'Nom' }}</label>
    <input class="form-control" name="nom" type="text" id="nom" value="{{ isset($etudiant->nom) ? $etudiant->nom : ''}}" required>
    {!! $errors->first('nom', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('prenom') ? 'has-error' : ''}}">
    <label for="prenom" class="control-label">{{ 'Prenom' }}</label>
    <input class="form-control" name="prenom" type="text" id="prenom" value="{{ isset($etudiant->prenom) ? $etudiant->prenom : ''}}" required>
    {!! $errors->first('prenom', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('date_nais') ? 'has-error' : ''}}">
    <label for="date_nais" class="control-label">{{ 'Date Nais' }}</label>
    <input class="form-control" name="date_nais" type="date" id="date_nais" value="{{ isset($etudiant->date_nais) ? $etudiant->date_nais : ''}}" required>
    {!! $errors->first('date_nais', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('lieu_nais') ? 'has-error' : ''}}">
    <label for="lieu_nais" class="control-label">{{ 'Lieu Nais' }}</label>
    <input class="form-control" name="lieu_nais" type="date" id="lieu_nais" value="{{ isset($etudiant->lieu_nais) ? $etudiant->lieu_nais : ''}}" required>
    {!! $errors->first('lieu_nais', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('matricule') ? 'has-error' : ''}}">
    <label for="matricule" class="control-label">{{ 'Matricule' }}</label>
    <input class="form-control" name="matricule" type="text" id="matricule" value="{{ isset($etudiant->matricule) ? $etudiant->matricule : ''}}" required>
    {!! $errors->first('matricule', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('utilisateur') ? 'has-error' : ''}}">
    <label for="utilisateur" class="control-label">{{ 'Utilisateur' }}</label>
    <input class="form-control" name="utilisateur" type="number" id="utilisateur" value="{{ isset($etudiant->utilisateur) ? $etudiant->utilisateur : ''}}" required>
    {!! $errors->first('utilisateur', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('niveau') ? 'has-error' : ''}}">
    <label for="niveau" class="control-label">{{ 'Niveau' }}</label>
    <input class="form-control" name="niveau" type="number" id="niveau" value="{{ isset($etudiant->niveau) ? $etudiant->niveau : ''}}" required>
    {!! $errors->first('niveau', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="center">
    <input class="btn btn-primary col-md-6" type="submit" value="{{ $formMode === 'edit' ? 'Modifier' : 'Ajouter' }}">
</div>
