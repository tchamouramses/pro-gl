@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Etudiant {{ $etudiant->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/etudiant/etudiant') }}" title="Retour" style="float: right;"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour</button></a>
                        <a href="{{ url('/admin/etudiant/etudiant/' . $etudiant->id . '/edit') }}" title="Modifier Etudiant"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modifier</button></a>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr><th> Nom </th><td> {{ $etudiant->nom }} </td></tr><tr><th> Prenom </th><td> {{ $etudiant->prenom }} </td></tr><tr><th> Date Nais </th><td> {{ $etudiant->date_nais }} </td></tr><tr><th> Lieu Nais </th><td> {{ $etudiant->lieu_nais }} </td></tr><tr><th> Matricule </th><td> {{ $etudiant->matricule }} </td></tr><tr><th> Utilisateur </th><td> {{ $etudiant->utilisateur }} </td></tr><tr><th> Niveau </th><td> {{ $etudiant->niveau }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
