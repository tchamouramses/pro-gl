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

                        <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-dark">
                                        <thead>
                                            <tr>
                                                <th>Nom</th><th>Date Fin</th><th>Date Debut</th><th> Fichier Join </th><th>Portee</th><th>Entreprise</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td> {{ $stage->nom }} </td>
                                                <td> {{ $stage->date_fin }} </td>
                                                <td>{{ $stage->date_debut }}</td>
                                                <td> <a href="{{url('storage/'.$stage->fichier_join)}}"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                                                <td> {{ $stage->portee }} </td><td> {{ $stage->entreprise->nom }} </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <br>
                            <br>
                            <br>
                            <div class="col-md-12" align="center">
                                <h4 align="center" style="color: blue;">Postulant</h4>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Date</th><th>Piece Jointe</th><th> Status</th><th>Etudiant</th><th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($postuler) && !empty($postuler))
                                        @foreach($postuler as $item)
                                            <tr>
                                                <td>{{ $item->date }}</td>
                                                <td><a href="{{url('storage/'.$item->piece_jointe)}}"><i class="fa fa-eye" aria-hidden="true"></ i></a></td>
                                                <td>{{ $item->statut }}</td>
                                                <td>{{ $item->etudiant->nom }}</td>
                                                <td>
                                                    <div class="row col-md-12">
                                                        <div class="col-md-6">
                                                            <a href="" class="btn btn-success">Valider</a>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <a href="" class="btn btn-danger">Refuser</a>                                     
                                                        </div>
                                                    </div>
                                                    
                                                </td>
                                            </tr>
                                        @endforeach
                                        @else
                                            <tr>
                                                <td colspan="5">
                                                    AUCUNE DEMANDE SOUMISE
                                                </td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
