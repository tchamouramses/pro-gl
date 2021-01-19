@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Donnee {{ $donnee->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/etudiant/donnee') }}" title="Retour" style="float: right;"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour</button></a>
                        <a href="{{ url('/admin/etudiant/donnee/' . $donnee->id . '/edit') }}" title="Modifier Donnee"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modifier</button></a>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr><th> Date </th><td> {{ $donnee->date }} </td></tr><tr><th> Valeur </th><td> {{ $donnee->valeur }} </td></tr><tr><th> Performance </th><td> {{ $donnee->performance }} </td></tr><tr><th> Type Perf </th><td> {{ $donnee->type_perf }} </td></tr><tr><th> Type Val </th><td> {{ $donnee->type_val }} </td></tr><tr><th> Description </th><td> {{ $donnee->description }} </td></tr><tr><th> Etudiant </th><td> {{ $donnee->etudiant }} </td></tr><tr><th> Categorie </th><td> {{ $donnee->categorie }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
