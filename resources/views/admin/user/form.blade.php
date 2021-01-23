<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Nom' }}</label>
    <input class="form-control" name="name" type="name" id="name" value="{{ (isset($user->name)) ? $user->name : old('name')}}" required>
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Email' }}</label>
    <input class="form-control" name="email" type="email" id="email" value="{{ isset($user->email) ? $user->email : old('email')}}" required>
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('profil') ? 'has-error' : ''}}">
    <label for="profil" class="control-label">{{ 'Photo de Profil' }}</label>
    <input class="form-control" name="profil" type="file" id="profil" value="{{ isset($user->profil) ? $user->profil : old('profil')}}" >
    {!! $errors->first('profil', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    <label for="password" class="control-label">{{ 'Mot de passe' }}</label>
    <input class="form-control" name="password" type="password" id="password" required>
    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group required ">
    <label for="password_confirmation" class="control-label">{{ 'Confirmer le mot de passe' }}</label>
    <input class="form-control" name="password_confirmation" type="password" id="password_confirmation" required>
    {!! $errors->first('password', '<p class="help-block" style="color: red;">:message</p>') !!}
</div>

<div>
    <label for="root">{{ 'le definir comme root' }}</label>
    <input name="root" type="checkbox" id="root">
</div>

<div class="form-group" align="center">
    <input class="btn btn-primary col-md-6" type="submit" value="{{ $formMode === 'edit' ? 'Modifier' : 'Ajouter' }}">
</div>
