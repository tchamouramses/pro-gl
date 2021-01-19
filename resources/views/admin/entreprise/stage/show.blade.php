@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Stage {{ $stage->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/stage') }}" title="Retour" style="float: right;"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour</button></a>
                        <a href="{{ url('/admin/stage/' . $stage->id . '/edit') }}" title="Modifier Stage"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modifier</button></a>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr><th> Nom </th><td> {{ $stage->nom }} </td></tr><tr><th> Date Fin </th><td> {{ $stage->date_fin }} </td></tr><tr><th> Date Debut </th><td> {{ $stage->date_debut }} </td></tr><tr><th> Fichier Join </th><td> {{ $stage->fichier_join }} </td></tr><tr><th> Portee </th><td> {{ $stage->portee }} </td></tr><tr><th> Entreprise </th><td> {{ $stage->entreprise }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
