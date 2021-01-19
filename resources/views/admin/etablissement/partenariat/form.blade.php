<div class="form-group {{ $errors->has('date_debut') ? 'has-error' : ''}}">
    <label for="date_debut" class="control-label">{{ 'Date Debut' }}</label>
    <input class="form-control" name="date_debut" type="date" id="date_debut" value="{{ isset($partenariat->date_debut) ? $partenariat->date_debut : ''}}" required>
    {!! $errors->first('date_debut', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('duree') ? 'has-error' : ''}}">
    <label for="duree" class="control-label">{{ 'Duree' }}</label>
    <input class="form-control" name="duree" type="number" id="duree" value="{{ isset($partenariat->duree) ? $partenariat->duree : ''}}" required>
    {!! $errors->first('duree', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('date_signature') ? 'has-error' : ''}}">
    <label for="date_signature" class="control-label">{{ 'Date Signature' }}</label>
    <input class="form-control" name="date_signature" type="date" id="date_signature" value="{{ isset($partenariat->date_signature) ? $partenariat->date_signature : ''}}" required>
    {!! $errors->first('date_signature', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('entreprise') ? 'has-error' : ''}}">
    <label for="entreprise" class="control-label">{{ 'Entreprise' }}</label>
    <input class="form-control" name="entreprise" type="number" id="entreprise" value="{{ isset($partenariat->entreprise) ? $partenariat->entreprise : ''}}" required>
    {!! $errors->first('entreprise', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('etablissement') ? 'has-error' : ''}}">
    <label for="etablissement" class="control-label">{{ 'Etablissement' }}</label>
    <input class="form-control" name="etablissement" type="number" id="etablissement" value="{{ isset($partenariat->etablissement) ? $partenariat->etablissement : ''}}" required>
    {!! $errors->first('etablissement', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="center">
    <input class="btn btn-primary col-md-6" type="submit" value="{{ $formMode === 'edit' ? 'Modifier' : 'Ajouter' }}">
</div>
