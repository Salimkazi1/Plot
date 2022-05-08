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
                @if($historiques->count() !=0)
                <table>
                    <tr>
                        <td><span class="navbar-brand mb-0 h3">  code:{{$historiques[0]->code}}</span></td>
                        <td><span class="navbar-brand mb-0 h3">téléphone:{{$historiques[0]->telephone}}</span></td>
                        <td><span class="navbar-brand mb-0 h3">date début:{{$historiques[0]->date_debut}}</span></td>

                    </tr>
                    <tr>
                        <td><span class="navbar-brand mb-0 h3"> nom:{{$historiques[0]->nom}}</span></td>
                        <td><span class="navbar-brand mb-0 h3">Email:{{$historiques[0]->email}}</span></td>
                        <td><span class="navbar-brand mb-0 h3">date fin:{{$historiques[0]->date_fin}}</span></td>
                    </tr>
                    <tr>
                        <td><span class="navbar-brand mb-0 h3">prénom:{{$historiques[0]->prenom}}</span></td>

                    </tr>
                </table>

                @endif
            <div class="box-body ">

                <table id="example1" class="table table-bordered table-striped dataTable">
                    <thead>
                    <tr role="row">
                        <th>Date de scan</th>
                        <th>Type</th>


                    </tr>
                    </thead>

                    <tbody>
                    @foreach($historiques as $historique)
                        <tr role="row">
                            <td>{{$historique->date_scan}}</td>
                            <td>{{$historique->type_scan}}</td>




                        </tr>


                        {{--MODAL HISTORIQUE DES ABONNES--}}


                        {{--<div class="example-modal" >--}}
                        {{--<div class="modal" id="show{{$abonne->id}}">--}}
                        {{--<div class="modal-dialog">--}}
                        {{--<div class="modal-content">--}}
                        {{--<div class="modal-header">--}}
                        {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                        {{--<span aria-hidden="true">&times;</span></button>--}}
                        {{--<h4 class="modal-title" style="font-family:verdana;">Détails sur l'historique de l'abonné</h4>--}}
                        {{--</div>--}}
                        {{--<div class="modal-body">--}}
                        {{--@foreach($abonnes as $abonne)--}}
                        {{--{{$abonne->nom}}--}}

                        {{--@endforeach--}}
                        {{--<!--  @if($user->admin == 1)--}}
                        {{--Administrateur--}}
                        {{--@endif -->--}}
                        {{--</div>--}}
                        {{--<div class="modal-footer">--}}
                        {{--<button type="button" class="btn btn-primary" data-dismiss="modal">Fermer</button>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--<!-- /.modal-content -->--}}
                        {{--</div>--}}
                        {{--<!-- /.modal-dialog -->--}}
                        {{--</div>--}}
                        {{--<!-- /.modal -->--}}
                        {{--</div>--}}
                        {{--<!-- /.example-modal -->--}}
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div><!-- /.box -->
    </section><!-- /.content -->

    <!-- Modal Dialog -->
    {{--<div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">--}}
        {{--<div class="modal-dialog">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--}}
                    {{--<h4 class="modal-title">Confirmation</h4>--}}
                {{--</div>--}}
                {{--<div class="modal-body">--}}
                    {{--<p>Voulez-vous vraiment supprimer cet abonné ?</p>--}}
                {{--</div>--}}
                {{--<div class="modal-footer">--}}
                    {{--{!! Form::open(['method'=>'POST','action' => ['AbonneController@delete']]) !!}--}}
                    {{--<input type="text" name="id" id="hiddenValue" value="" hidden/>--}}
                    {{--<button class="btn btn-sm btn-flat btn-warning pull-right" type="submit">Valider</button>--}}
                    {{--<button type="button" class="btn btn-sm btn-flat btn-success pull-right" data-dismiss="modal">Annuler</button>--}}
                    {{--{!! Form::close() !!}--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}



@endsection