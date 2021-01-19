@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">StatistiqueEtablissement {{ $statistiqueetablissement->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/statistique-etablissement') }}" title="Retour" style="float: right;"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour</button></a>
                        <a href="{{ url('/admin/statistique-etablissement/' . $statistiqueetablissement->id . '/edit') }}" title="Modifier StatistiqueEtablissement"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modifier</button></a>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr><th> Nb Postuler </th><td> {{ $statistiqueetablissement->nb_postuler }} </td></tr><tr><th> Taux Reussite Examen </th><td> {{ $statistiqueetablissement->taux_reussite_examen }} </td></tr><tr><th> Nb Diplome Annuelle </th><td> {{ $statistiqueetablissement->nb_diplome_annuelle }} </td></tr><tr><th> Nb Etudiant Affilier </th><td> {{ $statistiqueetablissement->nb_etudiant_affilier }} </td></tr><tr><th> Nb Entreprise Part </th><td> {{ $statistiqueetablissement->nb_entreprise_part }} </td></tr><tr><th> Nb Stage Recus </th><td> {{ $statistiqueetablissement->nb_stage_recus }} </td></tr><tr><th> F M J Programme </th><td> {{ $statistiqueetablissement->f_m_j_programme }} </td></tr><tr><th> Etablissement </th><td> {{ $statistiqueetablissement->etablissement }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
