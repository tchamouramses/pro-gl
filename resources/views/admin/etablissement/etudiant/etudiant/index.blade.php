@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Etudiant</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/etudiant/etudiant/create') }}" class="btn btn-success btn-sm" title="Ajout Etudiant">
                            <i class="fa fa-plus" aria-hidden="true"></i> Ajouter Nouveau
                        </a>

                        <form method="GET" action="{{ url('/admin/etudiant/etudiant') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Rechercher..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Nom</th><th>Prenom</th><th>Date Nais</th><th>Lieu Nais</th><th>Matricule</th><th>Utilisateur</th><th>Niveau</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($etudiant as $item)
                                    <tr>
                                        <td>{{ $item->nom }}</td><td>{{ $item->prenom }}</td><td>{{ $item->date_nais }}</td><td>{{ $item->lieu_nais }}</td><td>{{ $item->matricule }}</td><td>{{ $item->utilisateur }}</td><td>{{ $item->niveau }}</td>
                                        <td>
                                            <a href="{{ url('/admin/etudiant/etudiant/' . $item->id) }}" title="Details Etudiant"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            <a href="{{ url('/admin/etudiant/etudiant/' . $item->id . '/edit') }}" title="Modifier Etudiant"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>

                                            <button type="submit" class="btn btn-danger btn-sm  deleted_element" title="Delete Etudiant" onclick="return alertDeleteElement({{ $item->id }},'/admin/etudiant/etudiant/' + {{ $item->id }})"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $etudiant->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
