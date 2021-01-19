@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Entreprise {{ $entreprise->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/entreprise') }}" title="Retour" style="float: right;"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour</button></a>
                        <a href="{{ url('/admin/entreprise/' . $entreprise->id . '/edit') }}" title="Modifier Entreprise"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modifier</button></a>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr><th> Nom </th><td> {{ $entreprise->nom }} </td></tr><tr><th> Adresse </th><td> {{ $entreprise->adresse }} </td></tr><tr><th> Tel Entreprise </th><td> {{ $entreprise->tel_entreprise }} </td></tr><tr><th> Responsable </th><td> {{ $entreprise->responsable }} </td></tr><tr><th> Ville </th><td> {{ $entreprise->ville }} </td></tr><tr><th> Logo </th><td> {{ $entreprise->logo }} </td></tr><tr><th> Pays </th><td> {{ $entreprise->pays }} </td></tr><tr><th> Administrateur </th><td> {{ $entreprise->user->name }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
