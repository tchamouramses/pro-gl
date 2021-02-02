@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Liste des Stages en cour</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Date Fin</th><th>Date Debut</th><th>Fichier Join</th><th>Portee</th><th>Entreprise</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(isset($stage))
                                @foreach($stage as $item)
                                    <tr>
                                        <td>{{ $item->date_fin }}</td><td>{{ $item->date_debut }}</td><td><a href="{{ url('storage/'.$item->fichier_join) }}"><i class="fa fa-eye" aria-hidden="true"></i></a></td><td>{{ $item->portee }}</td><td>{{ $item->entreprise }}</td>
                                        <td>
                                            <div class="col-md-12">
                                            <button type="button" title="Voir les details de livraison" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#{{'ramses'.$item->id}}">Postuler
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </button>

                                                                            <!-- Modal -->
                                            <div class="modal fade" id="{{'ramses'.$item->id}}" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Postuler</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="container">
                                                    
                                                <form  method="POST" action="{{ url('/admin/etudiant/postuler') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                <div class="form-group required {{ $errors->has('piece_jointe') ? 'has-error' : ''}}">
                                                    <label for="piece_jointe" class="control-label">{{ 'Piece Jointe' }}</label>
                                                    <input class="form-control" name="piece_jointe" type="file" id="piece_jointe" required>
                                                </div>
                                                <div class="form-group required {{ $errors->has('stage') ? 'has-error' : ''}}">
                                                    <label for="stage" class="control-label">{{ 'Stage' }}</label>
                                                    <input class="form-control" name="stage" type="number" id="stage" value="{{ $item->id }}" required readonly>
                                                </div>


                                                <div class="form-group" align="center">
                                                    <input class="btn btn-primary col-md-6" type="submit" value="Postuler">
                                                </div>

                                                </form>
                                                </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                    <tr align="center">
                                        <td colspan="6">AUCUN STAGE EN COUR</td>
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
@endsection
