@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Partenariat {{ $partenariat->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/partenariat') }}" title="Retour" style="float: right;"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour</button></a>
                        <a href="{{ url('/admin/partenariat/' . $partenariat->id . '/edit') }}" title="Modifier Partenariat"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modifier</button></a>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr><th> Date Debut </th><td> {{ $partenariat->date_debut }} </td></tr><tr><th> Duree </th><td> {{ $partenariat->duree }} </td></tr><tr><th> Date Signature </th><td> {{ $partenariat->date_signature }} </td></tr><tr><th> Entreprise </th><td> {{ $partenariat->entreprise }} </td></tr><tr><th> Etablissement </th><td> {{ $partenariat->etablissement }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
