@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Stage</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/stage/create') }}" class="btn btn-success btn-sm" title="Ajout Stage">
                            <i class="fa fa-plus" aria-hidden="true"></i> Ajouter Nouveau
                        </a>

                        <form method="GET" action="{{ url('/admin/stage') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>Nom</th><th>Date Fin</th><th>Date Debut</th><th>Fichier Join</th><th>Portee</th><th>Entreprise</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($stage as $item)
                                    <tr>
                                        <td>{{ $item->nom }}</td><td>{{ $item->date_fin }}</td><td>{{ $item->date_debut }}</td><td>{{ $item->fichier_join }}</td><td>{{ $item->portee }}</td><td>{{ $item->entreprise->nom }}</td>
                                        <td>
                                            <a href="{{ url('/admin/stage/' . $item->id) }}" title="Details Stage"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            <a href="{{ url('/admin/stage/' . $item->id . '/edit') }}" title="Modifier Stage"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>

                                            <button type="submit" class="btn btn-danger btn-sm  deleted_element" title="Delete Stage" onclick="return alertDeleteElement({{ $item->id }},'/admin/stage/' + {{ $item->id }})"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $stage->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
