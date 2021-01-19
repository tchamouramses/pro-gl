@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">PeriodeAcademique {{ $periodeacademique->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/periode-academique') }}" title="Retour" style="float: right;"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour</button></a>
                        <a href="{{ url('/admin/periode-academique/' . $periodeacademique->id . '/edit') }}" title="Modifier PeriodeAcademique"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modifier</button></a>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr><th> Date Debut </th><td> {{ $periodeacademique->date_debut }} </td></tr><tr><th> Date Fin </th><td> {{ $periodeacademique->date_fin }} </td></tr><tr><th> Est Archive </th><td> {{ $periodeacademique->est_archive }} </td></tr><tr><th> Etablissement </th><td> {{ $periodeacademique->etablissement }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
