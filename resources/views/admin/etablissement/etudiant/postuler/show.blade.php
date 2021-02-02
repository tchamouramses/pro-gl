@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Postuler {{ $postuler->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/etudiant/postuler') }}" title="Retour" style="float: right;"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour</button></a>
                        <a href="{{ url('/admin/etudiant/postuler/' . $postuler->id . '/edit') }}" title="Modifier Postuler"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Modifier</button></a>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr><th> Date </th><td> {{ $postuler->date }} </td></tr><tr><th> Piece Jointe </th><td><a href="{{ url('storage/'.$postuler->piece_jointe) }}"><i class="fa fa-eye" aria-hidden="true"></i></button></a>  </td></tr><tr><th> Statut </th><td> {{ $postuler->statut }} </td></tr><tr><th> Stage </th><td> {{ $postuler->stage }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
