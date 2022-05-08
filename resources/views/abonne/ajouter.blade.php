@extends('app')
@section('content')

    <!-- Main content -->
    <section class="content">

        <div class=" col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8">

            @if(Session::has('error_msg'))
                <div class="alert alert-danger alert-dismissible"><span class="glyphicon glyphicon-alert"></span> <em>{!! session('error_msg') !!}</em>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                </div>
            @endif

            <div class="box box-primary">
                <div class="box-header with-border">

                    <h3 class="box-title"><b>Ajout d'abonne</b></h3>
                </div>

                <div class="box-body ">
                    {!! Form::open(['method'=>'POST','action' => ['AbonneController@store']]) !!}
                    <input type="hidden" id="IdSamedi" name="NSamedi" value="{{Input::old('NSamedi')}}"/>
                    <input type="hidden" id="IdDimanche" name="NDimanche" value="{{Input::old('NDimanche')}}"/>
                    <input type="hidden" id="IdLundi" name="NLundi"  value="{{Input::old('NLundi')}}" />
                    <input type="hidden" id="IdMardi" name="NMardi"  value="{{Input::old('NMardi')}}"/>
                    <input type="hidden" id="IdMercredi" name="NMercredi"  value="{{Input::old('NMercredi')}}"/>
                    <input type="hidden" id="IdJeudi" name="NJeudi"  value="{{Input::old('NJeudi')}}"/>
                    <input type="hidden" id="IdVendredi" name="NVendredi"  value="{{Input::old('NVendredi')}}"/>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </span>
                        <input type="text" class="form-control" name="nom" placeholder="Nom" value="{{Input::old('nom')}}" required>
                        <input type="text" class="form-control" name="prenom" placeholder="Prénom" value="{{Input::old('prenom')}}" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-phone"></i>
                        </span>
                        <input type="text" class="form-control" name="telephone" placeholder="Téléphone" value="{{Input::old('telephone')}}" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa- fa-envelope-square"></i>
                        </span>
                        <input type="email" class="form-control" name="email" placeholder="Email" value="{{Input::old('email')}}" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa- fa-barcode"></i>
                        </span>
                        <input type="code" class="form-control" name="code" placeholder="Code" value="{{Input::old('code')}}" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </span>
                        <input type="datetime-local" min="{{$today}}" class="form-control" name="date_debut" placeholder="Date début" value="{{Input::old('date_debut')}}" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </span>
                        <input type="datetime-local" class="form-control" name="date_fin" id="date_fin" placeholder="Date fin" value="{{Input::old('date_fin')}}" required>
                    </div>
                    <br>

                    <button type="button"  class="btn btn-danger btn-md identifyingClass" data-toggle="modal" data-id="plageAbonne" data-target="#plageAbonne">
                        <span class="glyphicon glyphicon-time" title="plage"></span>
                        &nbsp; &nbsp;plage
                    </button>


                    <!-- Modal Dialog -->
                    <div class="modal fade" id="plageAbonne" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Plage horaire de la semaine</h4>
                                </div>
                                <div class="modal-body">
                                    <div id="divsam">

                                        <h4>Samedi</h4>

                                        <div style="margin-left: 3%;" class="form-check form-check-inline">
                                            <input type="radio" class="form-check-input" id="ROuiSamedi" name="inlineMaterialRadiosExample">
                                            <label class="form-check-label" for="materialInline1">Oui</label>
                                            <input type="radio" class="form-check-input" id="RNonSamedi" name="inlineMaterialRadiosExample">
                                            <label class="form-check-label" for="materialInline2">Non</label>
                                        </div>


                                        <div id="plageSmedi" class="form-group">
                                            <label class="col-sm-2 control-label">Début</label>
                                            <div class="col-sm-3">
                                                <input type="time" id="timeSamediD" class="form-control" name="debutSamedi"   value="{{old('debutSamedi')}}">
                                            </div>

                                            <label class="col-sm-2 control-label">fin</label>
                                            <div class="col-sm-3">
                                                <input type="time" id="timeSamediF" class="form-control" name="finSamedi"   value="{{old('finSamedi')}}">
                                            </div>


                                        </div>
                                    </div>
                                    <br>
                                    <div id="divDim">

                                        <h4>Dimanche</h4>

                                        <div style="margin-left: 3%;" class="form-check form-check-inline">
                                            <input type="radio" class="form-check-input" id="ROuiDimanche" name="inlineMaterialRadiosExample1">
                                            <label class="form-check-label" for="materialInline1">Oui</label>
                                            <input type="radio" class="form-check-input" id="RNonDimanche" name="inlineMaterialRadiosExample1">
                                            <label class="form-check-label" for="materialInline2">Non</label>
                                        </div>


                                        <div id="plageDimanche" class="form-group">
                                            <label class="col-sm-2 control-label">Début</label>
                                            <div class="col-sm-3">
                                                <input type="time" id="timeDimancheD" class="form-control" name="debutDimanche"   value="{{old('debutDimanche')}}">
                                            </div>

                                            <label class="col-sm-2 control-label">fin</label>
                                            <div class="col-sm-3">
                                                <input type="time" id="timeDimancheF" class="form-control" name="finDimanche"   value="{{old('finDimanche')}}">
                                            </div>


                                        </div>
                                    </div>
                                    <br>
                                    <div id="divLundi">

                                        <h4>Lundi</h4>

                                        <div style="margin-left: 3%;" class="form-check form-check-inline">
                                            <input type="radio" class="form-check-input" id="ROuiLundi" name="inlineMaterialRadiosExample2">
                                            <label class="form-check-label" for="materialInline1">Oui</label>
                                            <input type="radio" class="form-check-input" id="RNonLundi" name="inlineMaterialRadiosExample2">
                                            <label class="form-check-label" for="materialInline2">Non</label>
                                        </div>


                                        <div id="plageLundi" class="form-group">
                                            <label class="col-sm-2 control-label">Début</label>
                                            <div class="col-sm-3">
                                                <input type="time" id="timeLundiD" class="form-control" name="debutLundi"   value="{{old('debutLundi')}}">
                                            </div>

                                            <label class="col-sm-2 control-label">fin</label>
                                            <div class="col-sm-3">
                                                <input type="time" id="timeLundiF" class="form-control" name="finLundi"   value="{{old('finLundi')}}">
                                            </div>


                                        </div>
                                    </div>
                                    <br>

                                    <div id="divsam">

                                        <h4>Mardi</h4>

                                        <div style="margin-left: 3%;" class="form-check form-check-inline">
                                            <input type="radio" class="form-check-input" id="ROuiMardi" name="inlineMaterialRadiosExample3">
                                            <label class="form-check-label" for="materialInline1">Oui</label>
                                            <input type="radio" class="form-check-input" id="RNonMardi" name="inlineMaterialRadiosExample3">
                                            <label class="form-check-label" for="materialInline2">Non</label>
                                        </div>


                                        <div id="plageMardi" class="form-group">
                                            <label class="col-sm-2 control-label">Début</label>
                                            <div class="col-sm-3">
                                                <input type="time" id="timeMardiD" class="form-control" name="debutMardi"   value="{{old('debutMardi')}}">
                                            </div>

                                            <label class="col-sm-2 control-label">fin</label>
                                            <div class="col-sm-3">
                                                <input type="time" id="timeMardiF" class="form-control" name="finMardi"   value="{{old('finMardi')}}">
                                            </div>


                                        </div>
                                    </div>
                                    <br>

                                    <div id="divsam">

                                        <h4>Mercredi</h4>

                                        <div style="margin-left: 3%;" class="form-check form-check-inline">
                                            <input type="radio" class="form-check-input" id="ROuiMercredi" name="inlineMaterialRadiosExample4">
                                            <label class="form-check-label" for="materialInline1">Oui</label>
                                            <input type="radio" class="form-check-input" id="RNonMercredi" name="inlineMaterialRadiosExample4">
                                            <label class="form-check-label" for="materialInline2">Non</label>
                                        </div>


                                        <div id="plageMercredi" class="form-group">
                                            <label class="col-sm-2 control-label">Début</label>
                                            <div class="col-sm-3">
                                                <input type="time" id="timeMercrediD" class="form-control" name="debutMercredi"   value="{{old('debutMercredi')}}">
                                            </div>

                                            <label class="col-sm-2 control-label">fin</label>
                                            <div class="col-sm-3">
                                                <input type="time" id="timeMercrediF" class="form-control" name="finMercredi"   value="{{old('finMercredi')}}">
                                            </div>


                                        </div>
                                    </div>
                                    <br>

                                    <div id="divsam">

                                        <h4>Jeudi</h4>

                                        <div style="margin-left: 3%;" class="form-check form-check-inline">
                                            <input type="radio" class="form-check-input" id="ROuiJeudi" name="inlineMaterialRadiosExample5">
                                            <label class="form-check-label" for="materialInline1">Oui</label>
                                            <input type="radio" class="form-check-input" id="RNonJeudi" name="inlineMaterialRadiosExample5">
                                            <label class="form-check-label" for="materialInline2">Non</label>
                                        </div>


                                        <div id="plageJeudi" class="form-group">
                                            <label class="col-sm-2 control-label">Début</label>
                                            <div class="col-sm-3">
                                                <input type="time" id="timeJeudiD" class="form-control" name="debutJeudi"   value="{{old('debutJeudi')}}">
                                            </div>

                                            <label class="col-sm-2 control-label">fin</label>
                                            <div class="col-sm-3">
                                                <input type="time" id="timeJeudiF" class="form-control" name="finJeudi"   value="{{old('finJeudi')}}">
                                            </div>


                                        </div>
                                    </div>

                                    <br>

                                    <div id="divsam">

                                        <h4>Vendredi</h4>

                                        <div style="margin-left: 3%;" class="form-check form-check-inline">
                                            <input type="radio" class="form-check-input" id="ROuiVendredi" name="inlineMaterialRadiosExample6">
                                            <label class="form-check-label" for="materialInline1">Oui</label>
                                            <input type="radio" class="form-check-input" id="RNonVendredi" name="inlineMaterialRadiosExample6">
                                            <label class="form-check-label" for="materialInline2">Non</label>
                                        </div>


                                        <div id="plageVendredi"class="form-group">
                                            <label class="col-sm-2 control-label">Début</label>
                                            <div class="col-sm-3">
                                                <input type="time" id="timeVendrediD" class="form-control" name="debutVendredi"   value="{{old('debutVendredi')}}">
                                            </div>

                                            <label class="col-sm-2 control-label">fin</label>
                                            <div class="col-sm-3">
                                                <input type="time" id="timeVendrediF" class="form-control" name="finVendredi"   value="{{old('finVendredi')}}">
                                            </div>


                                        </div>

                                    </div>
                                    <br>


                                </div>

                                <div class="modal-footer">
                                    <input type="submit" class="btn btn-flat btn-info pull-right" value="Valider">
                                    <a href="{{ url('/abonne/index') }}" class="btn btn-flat btn-warning pull-right" >Annuler</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <a href="{{ url('/abonne/index') }}" class="btn btn-flat btn-warning pull-right" >Annuler</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        $(document).ready(function(){

            showSectionFixe();
            $("#IDnavbarParHeure").click(function() {
                // remove classes from all
                $("#navbarSelected").val("h");
            });
            $("#IDnavbarParJour").click(function() {
                // remove classes from all
                $("#navbarSelected").val("j");
            });
        });
        function CacheHeureSamedi(t)
        {
            if(t=="0")
            {
                $('#plageSmedi').hide();
                $('#IdSamedi').val("0");
                $("#timeSamediD").removeAttr("required");
                $("#timeSamediF").removeAttr("required");
            }

            if(t=="1")
            {
                $('#IdSamedi').val("1");
                $('#plageSmedi').show();
                $("#timeSamediD").attr("required", "");
                $("#timeSamediF").attr("required", "");
            }


        }

        $('#RNonSamedi').click(function() {
            CacheHeureSamedi("0");
        });
        $('#ROuiSamedi').click(function() {
            CacheHeureSamedi("1");
        });

        function CacheHeureDimanche(t)
        {
            if(t=="0")
            {
                $('#plageDimanche').hide();
                $('#IdDimanche').val("false");
                $("#timeDimancheD").removeAttr("required");
                $("#timeDimancheF").removeAttr("required");
            }

            if(t=="1")
            {
                $('#plageDimanche').show();
                $('#IdDimanche').val("1");
                $("#timeDimancheD").attr("required", "");
                $("#timeDimancheF").attr("required", "");
            }

        }

        $('#RNonDimanche').click(function() {
            CacheHeureDimanche("0");
        });
        $('#ROuiDimanche').click(function() {
            CacheHeureDimanche("1");
        });

        function CacheHeureLundi(t)
        {
            if(t=="0"){
                $('#plageLundi').hide();
            $('#IdLundi').val("0");
                $("#timeLundiD").removeAttr("required");
                $("#timeLundiF").removeAttr("required");
            }
            if(t=="1"){
                $('#plageLundi').show();
                $('#IdLundi').val("1");
                $("#timeLundiD").attr("required", "");
                $("#timeLundiF").attr("required", "");
            }

        }

        $('#RNonLundi').click(function() {
            CacheHeureLundi("0");
        });
        $('#ROuiLundi').click(function() {
            CacheHeureLundi("1");
        });

        function CacheHeureMardi(t)
        {
            if(t=="0"){
                $('#plageMardi').hide();
                $('#IdMardi').val("0");
                $("#timeMardiD").removeAttr("required");
                $("#timeMardiF").removeAttr("required");
            }


            if(t=="1"){
                $('#plageMardi').show();
                $('#IdMardi').val("1");
                $("#timeMardiD").attr("required", "");
                $("#timeMardiF").attr("required", "");
            }

        }

        $('#RNonMardi').click(function() {
            CacheHeureMardi("0");
        });
        $('#ROuiMardi').click(function() {
            CacheHeureMardi("1");
        });

        function CacheHeureMercredi(t)
        {
            if(t=="0")
            {
                $('#plageMercredi').hide();
                $('#IdMercredi').val("0");
                $("#timeMercrediD").removeAttr("required");
                $("#timeMercrediF").removeAttr("required");
            }


            if(t=="1"){
                $('#plageMercredi').show();
                $('#IdMercredi').val("1");
                $("#timeMercrediD").attr("required", "");
                $("#timeMercrediF").attr("required", "");
            }

        }

        $('#RNonMercredi').click(function() {
            CacheHeureMercredi("0");
        });
        $('#ROuiMercredi').click(function() {
            CacheHeureMercredi("1");
        });

        function CacheHeureJeudi(t)
        {
            if(t=="0"){
                $('#plageJeudi').hide();
                $('#IdJeudi').val("0");
                $("#timeJeudiD").removeAttr("required");
                $("#timeJeudiF").removeAttr("required");
            }


            if(t=="1"){
                $('#plageJeudi').show();
                $('#IdJeudi').val("1");
                $("#timeJeudiD").attr("required", "");
                $("#timeJeudiF").attr("required", "");
            }

        }

        $('#RNonJeudi').click(function() {
            CacheHeureJeudi("0");});

        $('#ROuiJeudi').click(function() {
            CacheHeureJeudi("1")});


        function CacheHeureVendredi(t)
        {
            if(t=="0"){
                $('#plageVendredi').hide();
                $('#IdVendredi').val("0");
                $("#timeVendrediD").removeAttr("required");
                $("#timeVendrediF").removeAttr("required");

            }


            if(t=="1"){
                $('#plageVendredi').show();
                $('#IdVendredi').val("1");
                $("#timeVendrediD").attr("required", "");
                $("#timeVendrediF").attr("required", "");
            }

        }

        $('#RNonVendredi').click(function() {
            CacheHeureVendredi("0");});

        $('#ROuiVendredi').click(function() {
            CacheHeureVendredi("1")});


    </script>

@stop