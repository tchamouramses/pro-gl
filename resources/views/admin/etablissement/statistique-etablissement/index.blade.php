@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Statistiqueetablissement</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/statistique-etablissement/create') }}" class="btn btn-success btn-sm" title="Ajout StatistiqueEtablissement">
                            <i class="fa fa-plus" aria-hidden="true"></i> Ajouter Nouveau
                        </a>

                        <form method="GET" action="{{ url('/admin/statistique-etablissement') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>Nb Postuler</th><th>Taux Reussite Examen</th><th>Nb Diplome Annuelle</th><th>Nb Etudiant Affilier</th><th>Nb Entreprise Part</th><th>Nb Stage Recus</th><th>F M J Programme</th><th>Etablissement</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($statistiqueetablissement as $item)
                                    <tr>
                                        <td>{{ $item->nb_postuler }}</td><td>{{ $item->taux_reussite_examen }}</td><td>{{ $item->nb_diplome_annuelle }}</td><td>{{ $item->nb_etudiant_affilier }}</td><td>{{ $item->nb_entreprise_part }}</td><td>{{ $item->nb_stage_recus }}</td><td>{{ $item->f_m_j_programme }}</td><td>{{ $item->etablissement }}</td>
                                        <td>
                                            <a href="{{ url('/admin/statistique-etablissement/' . $item->id) }}" title="Details StatistiqueEtablissement"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                            <a href="{{ url('/admin/statistique-etablissement/' . $item->id . '/edit') }}" title="Modifier StatistiqueEtablissement"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>

                                            <button type="submit" class="btn btn-danger btn-sm  deleted_element" title="Delete StatistiqueEtablissement" onclick="return alertDeleteElement({{ $item->id }},'/admin/statistique-etablissement/' + {{ $item->id }})"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $statistiqueetablissement->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
