@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Organisme {{ $organisme->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/organisme') }}" title="Retour" style="float: right;"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour</button></a>
                        <a href="{{ url('/admin/organisme/' . $organisme->id . '/edit') }}" title="Modifier Organisme"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modifier</button></a>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr><th> Nom </th><td> {{ $organisme->nom }} </td></tr><tr><th> Ville </th><td> {{ $organisme->ville }} </td></tr><tr><th> Adresse </th><td> {{ $organisme->adresse }} </td></tr><tr><th> Responsable </th><td> {{ $organisme->responsable }} </td></tr><tr><th> Logo </th><td> {{ $organisme->logo }} </td></tr><tr><th> Pays </th><td> {{ $organisme->pays }} </td></tr><tr><th> Tel Entreprise </th><td> {{ $organisme->tel_entreprise }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
