@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Organisme</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/organisme/create') }}" class="btn btn-success btn-sm" title="Ajout Organisme">
                            <i class="fa fa-plus" aria-hidden="true"></i> Ajouter Nouveau
                        </a>

                        <form method="GET" action="{{ url('/admin/organisme') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>Nom</th><th>Ville</th><th>Adresse</th><th>Responsable</th><th>Logo</th><th>Pays</th><th>Tel Entreprise</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($organisme as $item)
                                    <tr>
                                        <td>{{ $item->nom }}</td><td>{{ $item->ville }}</td><td>{{ $item->adresse }}</td><td>{{ $item->responsable }}</td><td>{{ $item->logo }}</td><td>{{ $item->pays }}</td><td>{{ $item->tel_entreprise }}</td>
                                        <td>
                                            <a href="{{ url('/admin/organisme/' . $item->id) }}" title="Details Organisme"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            <a href="{{ url('/admin/organisme/' . $item->id . '/edit') }}" title="Modifier Organisme"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>

                                            <button type="submit" class="btn btn-danger btn-sm  deleted_element" title="Delete Organisme" onclick="return alertDeleteElement({{ $item->id }},'/admin/organisme/' + {{ $item->id }})"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $organisme->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
