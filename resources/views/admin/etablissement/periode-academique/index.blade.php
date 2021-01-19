@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Periodeacademique</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/periode-academique/create') }}" class="btn btn-success btn-sm" title="Ajout PeriodeAcademique">
                            <i class="fa fa-plus" aria-hidden="true"></i> Ajouter Nouveau
                        </a>

                        <form method="GET" action="{{ url('/admin/periode-academique') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>Date Debut</th><th>Date Fin</th><th>Est Archive</th><th>Etablissement</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($periodeacademique as $item)
                                    <tr>
                                        <td>{{ $item->date_debut }}</td><td>{{ $item->date_fin }}</td><td>{{ $item->est_archive }}</td><td>{{ $item->etablissement }}</td>
                                        <td>
                                            <a href="{{ url('/admin/periode-academique/' . $item->id) }}" title="Details PeriodeAcademique"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            <a href="{{ url('/admin/periode-academique/' . $item->id . '/edit') }}" title="Modifier PeriodeAcademique"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>

                                            <button type="submit" class="btn btn-danger btn-sm  deleted_element" title="Delete PeriodeAcademique" onclick="return alertDeleteElement({{ $item->id }},'/admin/periode-academique/' + {{ $item->id }})"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $periodeacademique->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
