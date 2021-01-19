<div class="form-group {{ $errors->has('nom') ? 'has-error' : ''}}">
    <label for="nom" class="control-label">{{ 'Nom' }}</label>
    <input class="form-control" name="nom" type="text" id="nom" value="{{ isset($etablissement->nom) ? $etablissement->nom : ''}}" required>
    {!! $errors->first('nom', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('ville') ? 'has-error' : ''}}">
    <label for="ville" class="control-label">{{ 'Ville' }}</label>
    <input class="form-control" name="ville" type="text" id="ville" value="{{ isset($etablissement->ville) ? $etablissement->ville : ''}}" required>
    {!! $errors->first('ville', '<p class="help-block">:message</p>') !!}
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
