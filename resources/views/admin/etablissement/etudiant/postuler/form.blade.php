<div class="form-group {{ $errors->has('date') ? 'has-error' : ''}}">
    <label for="date" class="control-label">{{ 'Date' }}</label>
    <input class="form-control" name="date" type="date" id="date" value="{{ isset($postuler->date) ? $postuler->date : ''}}" required>
    {!! $errors->first('date', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('piece_jointe') ? 'has-error' : ''}}">
    <label for="piece_jointe" class="control-label">{{ 'Piece Jointe' }}</label>
    <input class="form-control" name="piece_jointe" type="file" id="piece_jointe" value="{{ isset($postuler->piece_jointe) ? $postuler->piece_jointe : ''}}" required>
    {!! $errors->first('piece_jointe', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('statut') ? 'has-error' : ''}}">
    <label for="statut" class="control-label">{{ 'Statut' }}</label>
    <select name="statut" class="form-control" id="statut" required>
    @foreach (json_decode('{"ACCEPTER":"ACCEPTER","REJETER":"REJETER","ATTENTE":"ATTENTE"}', true) as $optionKey => $optionValue)
        <option value="{{ $optionKey }}" {{ (isset($postuler->statut) && $postuler->statut == $optionKey) ? 'selected' : ''}}>{{ $optionValue }}</option>
    @endforeach
</select>
    {!! $errors->first('statut', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('etudiant') ? 'has-error' : ''}}">
    <label for="etudiant" class="control-label">{{ 'Etudiant' }}</label>
    <input class="form-control" name="etudiant" type="number" id="etudiant" value="{{ isset($postuler->etudiant) ? $postuler->etudiant : ''}}" required>
    {!! $errors->first('etudiant', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('stage') ? 'has-error' : ''}}">
    <label for="stage" class="control-label">{{ 'Stage' }}</label>
    <input class="form-control" name="stage" type="number" id="stage" value="{{ isset($postuler->stage) ? $postuler->stage : ''}}" required>
    {!! $errors->first('stage', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group" align="center">
    <input class="btn btn-primary col-md-6" type="submit" value="{{ $formMode === 'edit' ? 'Modifier' : 'Ajouter' }}">
</div>
