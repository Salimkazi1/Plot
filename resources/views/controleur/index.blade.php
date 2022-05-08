@extends('app')
@section('content')

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-primary">

            @if(Session::has('success_msg'))
                <div class="alert alert-success alert-dismissible"><span class="glyphicon glyphicon-ok"></span> <em>{!! session('success_msg') !!}</em>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                </div>
            @endif

            @if(Session::has('error_msg'))
                <div class="alert alert-danger alert-dismissible"><span class="glyphicon glyphicon-alert"></span> <em>{!! session('error_msg') !!}</em>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                </div>
            @endif

            <div class="box-header with-border">
                <h3 class="box-title"><b>Liste des contrôleurs</b></h3>
                <div class="box-tools pull-right">
                    <a href="{{URL("/controleur/ajouter")}}" class="btn btn-flat btn-success">
                        <span class="glyphicon glyphicon-plus" aria-hidden="false"></span>
                        Ajouter
                    </a>
                </div>
            </div>

            <div class="box-body ">
                <table id="example1" class="table table-bordered table-striped dataTable">
                    <thead>
                    <tr role="row">
                        <th>Adresse IP</th>
                        <th>Type</th>
                        <th>Libellé niveau</th>
                        <th>Opération</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($controleurs as $controleur)
                        <tr role="row">
                            <td>{{$controleur->adresse_ip}}</td>
                            <td>{{$controleur->type}}</td>
                            <td>{{$controleur->Niveau->LIBELLE_NIVEAU}}</td>
                            <td>
                                <a href="{{URL('/controleur/modifier/'.$controleur->id)}}" type="button" class="btn btn-default btn-sm">
                                    <span class="glyphicon glyphicon-edit" title="Modifier"></span>
                                </a>

                                <a type="button" class="btn btn-danger btn-sm identifyingClass" data-toggle="modal" data-id="{{$controleur->id}}" data-target="#confirmDelete">
                                    <span class="glyphicon glyphicon-trash" title="Supprimer"></span>
                                </a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div><!-- /.box -->
    </section><!-- /.content -->

    <!-- Modal Dialog -->
    <div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Confirmation</h4>
                </div>
                <div class="modal-body">
                    <p>Voulez-vous vraiment supprimer ce contrôleur ?</p>
                </div>
                <div class="modal-footer">
                    {!! Form::open(['method'=>'POST','action' => ['ControleurController@delete']]) !!}
                    <input type="text" name="id" id="hiddenValue" value="" hidden/>
                    <button class="btn btn-sm btn-flat btn-warning pull-right" type="submit">Valider</button>
                    <button type="button" class="btn btn-sm btn-flat btn-success pull-right" data-dismiss="modal">Annuler</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection