@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">CategorieDonnee {{ $categoriedonnee->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/etudiant/categorie-donnee') }}" title="Retour" style="float: right;"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour</button></a>
                        <a href="{{ url('/admin/etudiant/categorie-donnee/' . $categoriedonnee->id . '/edit') }}" title="Modifier CategorieDonnee"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modifier</button></a>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr><th> Nom </th><td> {{ $categoriedonnee->nom }} </td></tr><tr><th> Group </th><td> {{ $categoriedonnee->group }} </td></tr><tr><th> Description </th><td> {{ $categoriedonnee->description }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
