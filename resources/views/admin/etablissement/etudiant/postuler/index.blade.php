@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Postuler</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/etudiant/postuler/create') }}" class="btn btn-success btn-sm" title="Ajout Postuler">
                            <i class="fa fa-plus" aria-hidden="true"></i> Ajouter Nouveau
                        </a>

                        <form method="GET" action="{{ url('/admin/etudiant/postuler') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>Date</th><th>Piece Jointe</th><th>Statut</th><th>Etudiant</th><th>Stage</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($postuler as $item)
                                    <tr>
                                        <td>{{ $item->date }}</td><td>{{ $item->piece_jointe }}</td><td>{{ $item->statut }}</td><td>{{ $item->etudiant }}</td><td>{{ $item->stage }}</td>
                                        <td>
                                            <a href="{{ url('/admin/etudiant/postuler/' . $item->id) }}" title="Details Postuler"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            <a href="{{ url('/admin/etudiant/postuler/' . $item->id . '/edit') }}" title="Modifier Postuler"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>

                                            <button type="submit" class="btn btn-danger btn-sm  deleted_element" title="Delete Postuler" onclick="return alertDeleteElement({{ $item->id }},'/admin/etudiant/postuler/' + {{ $item->id }})"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $postuler->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
