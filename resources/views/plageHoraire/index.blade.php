@extends('app')
@section('content')

    <div class="box-header with-border">
                <h3 class="box-title"><b>Liste des plages horaires pour les visiteurs</b></h3>
                <div class="box-tools pull-right">
                    <a href="{{URL("/plagehoraire/ajouter")}}" class="btn btn-flat btn-success">
                        <span class="glyphicon glyphicon-plus" aria-hidden="false"></span>
                        Ajouter
                    </a>
                </div>
            </div>

            <div class="box-body ">
                <table id="example1" class="table table-bordered table-striped dataTable">
                    <thead>
                    <tr role="row">
                        <th>Libellé</th>
                        <th>Début</th>
                        <th>Fin</th>
                        <th>Tarif</th>
                        <th>type de plage horaire</th>
                        <th>Opération</th>
                    </tr>

                    </thead>
                    <tbody>
                    @foreach($plagehoraire as $plage)
                        <tr role="row">

                            <td>{{$plage->libelle_plage_horaire}}</td>

                            @if($plage->type_plage == "j")
                                <td>/</td>
                                <td>/</td>
                            @else
                                <td>{{$plage->heure_debut}}</td>
                                <td>{{$plage->heure_fin}}</td>
                            @endif




                            <td>{{$plage->tarif}}</td>
                            <td>{{$plage->type_plage}} </td>

                            <td>
                                <a type="button" class="btn btn-danger btn-sm identifyingClass" data-toggle="modal" data-id="{{$plage->id}}" data-target="#confirmDelete">
                                    <span class="glyphicon glyphicon-trash" title="Supprimer"></span>
                                </a>
                            </td>

                        </tr>



                    @endforeach
                    </tbody>

    </table>
    </div>
@endsection