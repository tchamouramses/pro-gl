@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Ajout Postuler</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/etudiant/postuler') }}" title="Retour" style="float: right;"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        @include ('admin/etablissement/etudiant.postuler.form', ['formMode' => 'create'])

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
