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
                    <h3 class="box-title"><b>Modification d'abonné</b></h3>
                </div>

                <div class="box-body ">
                    {!! Form::open(['method'=>'POST','action' => ['AbonneController@update', $abonne->id]]) !!}







                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </span>
                        <input type="text" class="form-control" name="nom" placeholder="Nom" @if(Input::old('nom')) value="{{Input::old('nom')}}" @else value="{{$abonne->nom}}" @endif required>
                        <input type="text" class="form-control" name="prenom" placeholder="Prénom" @if(Input::old('prenom')) value="{{Input::old('prenom')}}" @else value="{{$abonne->prenom}}" @endif required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-phone"></i>
                        </span>
                        <input type="text" class="form-control" name="telephone" placeholder="Téléphone" @if(Input::old('telephone')) value="{{Input::old('telephone')}}" @else value="{{$abonne->telephone}}" @endif required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa- fa-envelope-square"></i>
                        </span>
                        <input type="email" class="form-control" name="email" placeholder="Email" @if(Input::old('email')) value="{{Input::old('email')}}" @else value="{{$abonne->email}}" @endif required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa- fa-barcode"></i>
                        </span>
                        <input type="code" class="form-control" name="code" placeholder="Code" @if(Input::old('code')) value="{{Input::old('code')}}" @else value="{{$abonne->code}}" @endif required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </span>
                        <input type="datetime-local" class="form-control" name="date_debut" placeholder="Date début" @if(Input::old('date_debut')) value="{{Input::old('date_debut')}}" @else value="{{$abonne->date_debut}}" @endif required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </span>
                        <input type="datetime-local" class="form-control" name="date_fin"  placeholder="Date fin" @if(Input::old('date_fin')) value="{{Input::old('date_fin')}}" @else value="{{$abonne->date_fin}}" @endif required>

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
                                    <div class="hidden">
                                        @foreach($plage as $item)

                                        @if ($item->jour=="6")
                                            {{$samedi=$item}}
                                                <input type="hidden" id="IdSamedi" name="NSamedi" value="{{$item->acces}}"/> @endif
                                        @if   ($item->jour=="0")
                                                    {{$dimanche=$item}}
                                                <input type="hidden" id="IdDimanche" name="NDimanche" value="{{$item->acces}}"/>@endif
                                            @if ($item->jour=="1")
                                                {{$lundi=$item}} <input type="hidden" id="IdLundi" name="NLundi" value="{{$item->acces}}"/>@endif
                                            @if   ($item->jour=="2")
                                                {{$mardi=$item}}
                                                <input type="hidden" id="IdMardi" name="NMardi" value="{{$item->acces}}"/>@endif
                                            @if ($item->jour=="3")
                                                {{$mercredi=$item}} <input type="hidden" id="IdMercredi" name="NMercredi" value="{{$item->acces}}"/> @endif
                                            @if   ($item->jour=="4")
                                                {{$jeudi=$item}} <input type="hidden" id="IdJeudi" name="NJeudi" value="{{$item->acces}}"/> @endif

                                            @if   ($item->jour=="5")
                                                {{$vendredi=$item}} <input type="hidden" id="IdVendredi" name="NVendredi" value="{{$item->acces}}"/>@endif

                                                    @endforeach


                                    </div>
                                    <div id="divsam">

                                        <h4>Samedi</h4>


                                        {{--@foreach($plage as $item)--}}
                                            {{--{--}}
                                                {{--@if($item->jour)--}}
                                            {{--}--}}

                                        <div style="margin-left: 3%;" class="form-check form-check-inline">
                                            <input type="radio" class="form-check-input" id="ROuiSamedi"  name="inlineMaterialRadiosExample"  @if($samedi && $samedi->acces=="1") checked @endif>
                                            <label class="form-check-label" for="materialInline1">Oui</label>
                                            <input type="radio" class="form-check-input" id="RNonSamedi" name="inlineMaterialRadiosExample"  @if($samedi && $samedi->acces=="0") checked @endif>
                                            <label class="form-check-label" for="materialInline2">Non</label>
                                        </div>


                                        <div id="plageSmedi" class="form-group" @if($samedi && $samedi->acces=="0") style="display: none"  @endif>
                                            <label class="col-sm-2 control-label">Début</label>
                                            <div class="col-sm-3">
                                                <input type="time" id="timeSamediD" class="form-control" name="debutSamedi"   value="{{$samedi->heure_debut}}">
                                            </div>

                                            <label class="col-sm-2 control-label">fin</label>
                                            <div class="col-sm-3">
                                                <input type="time" id="timeSamediF" class="form-control" name="finSamedi"   value="{{$samedi->heure_fin}}">
                                            </div>


                                        </div>
                                    </div>
                                    <br>
                                    <div id="divDim">

                                        <h4>Dimanche</h4>

                                        <div style="margin-left: 3%;" class="form-check form-check-inline">
                                            <input type="radio" class="form-check-input" id="ROuiDimanche" name="inlineMaterialRadiosExample1"   @if($dimanche->acces=="1") checked @endif>
                                            <label class="form-check-label" for="materialInline1">Oui</label>
                                            <input type="radio" class="form-check-input" id="RNonDimanche" name="inlineMaterialRadiosExample1"   @if($dimanche->acces=="0") checked @endif>
                                            <label class="form-check-label" for="materialInline2">Non</label>
                                        </div>


                                        <div id="plageDimanche" class="form-group" @if($dimanche && $dimanche->acces=="0") style="display: none"  @endif>
                                            <label class="col-sm-2 control-label">Début</label>
                                            <div class="col-sm-3">
                                                <input type="time" id="timeDimancheD" class="form-control" name="debutDimanche"   value="{{$dimanche->heure_debut}}">
                                            </div>

                                            <label class="col-sm-2 control-label">fin</label>
                                            <div class="col-sm-3">
                                                <input type="time" id="timeDimancheF" class="form-control" name="finDimanche"   value="{{$dimanche->heure_fin}}">
                                            </div>


                                        </div>
                                    </div>
                                    <br>
                                    <div id="divLundi">

                                        <h4>Lundi</h4>

                                        <div style="margin-left: 3%;" class="form-check form-check-inline">
                                            <input type="radio" class="form-check-input" id="ROuiLundi" name="inlineMaterialRadiosExample2"  @if($lundi && $lundi->acces=="1") checked @endif>
                                            <label class="form-check-label" for="materialInline1">Oui</label>
                                            <input type="radio" class="form-check-input" id="RNonLundi" name="inlineMaterialRadiosExample2"  @if($lundi && $lundi->acces=="0") checked @endif>
                                            <label class="form-check-label" for="materialInline2">Non</label>
                                        </div>


                                        <div id="plageLundi" class="form-group"  @if($lundi && $lundi->acces=="0") style="display: none"  @endif>
                                            <label class="col-sm-2 control-label">Début</label>
                                            <div class="col-sm-3">
                                                <input type="time" id="timeLundiD" class="form-control" name="debutLundi"   value="{{$lundi->heure_debut}}">
                                            </div>

                                            <label class="col-sm-2 control-label">fin</label>
                                            <div class="col-sm-3">
                                                <input type="time" id="timeLundiF" class="form-control" name="finLundi"   value="{{$lundi->heure_fin}}">
                                            </div>


                                        </div>
                                    </div>
                                    <br>

                                    <div id="divsam">

                                        <h4>Mardi</h4>

                                        <div style="margin-left: 3%;" class="form-check form-check-inline">
                                            <input type="radio" class="form-check-input" id="ROuiMardi" name="inlineMaterialRadiosExample3" @if($mardi && $mardi->acces=="1") checked @endif>
                                            <label class="form-check-label" for="materialInline1">Oui</label>
                                            <input type="radio" class="form-check-input" id="RNonMardi" name="inlineMaterialRadiosExample3" @if($mardi && $mardi->acces=="0") checked @endif>
                                            <label class="form-check-label" for="materialInline2">Non</label>
                                        </div>


                                        <div id="plageMardi" class="form-group" @if($mardi && $mardi->acces=="0") style="display: none"  @endif>
                                            <label class="col-sm-2 control-label">Début</label>
                                            <div class="col-sm-3">
                                                <input type="time" id="timeMardiD" class="form-control" name="debutMardi"   value="{{$mardi->heure_debut}}">
                                            </div>

                                            <label class="col-sm-2 control-label">fin</label>
                                            <div class="col-sm-3">
                                                <input type="time" id="timeMardiF" class="form-control" name="finMardi"   value="{{$mardi->heure_fin}}">
                                            </div>


                                        </div>
                                    </div>
                                    <br>

                                    <div id="divsam">

                                        <h4>Mercredi</h4>

                                        <div style="margin-left: 3%;" class="form-check form-check-inline">
                                            <input type="radio" class="form-check-input" id="ROuiMercredi" name="inlineMaterialRadiosExample4" @if($mercredi && $mercredi->acces=="1") checked @endif>
                                            <label class="form-check-label" for="materialInline1">Oui</label>
                                            <input type="radio" class="form-check-input" id="RNonMercredi" name="inlineMaterialRadiosExample4" @if($mercredi && $mercredi->acces=="0") checked @endif>
                                            <label class="form-check-label" for="materialInline2">Non</label>
                                        </div>


                                        <div id="plageMercredi" class="form-group"  @if($mercredi && $mercredi->acces=="0") style="display: none"  @endif>
                                            <label class="col-sm-2 control-label">Début</label>
                                            <div class="col-sm-3">
                                                <input type="time" id="timeMercrediD" class="form-control" name="debutMercredi"   value="{{$mercredi->heure_debut}}">
                                            </div>

                                            <label class="col-sm-2 control-label">fin</label>
                                            <div class="col-sm-3">
                                                <input type="time" id="timeMercrediF" class="form-control" name="finMercredi"   value="{{$mercredi->heure_fin}}">
                                            </div>


                                        </div>
                                    </div>
                                    <br>

                                    <div id="divsam">

                                        <h4>Jeudi</h4>

                                        <div style="margin-left: 3%;" class="form-check form-check-inline">
                                            <input type="radio" class="form-check-input" id="ROuiJeudi" name="inlineMaterialRadiosExample5"  @if($jeudi && $jeudi->acces=="1") checked @endif>
                                            <label class="form-check-label" for="materialInline1">Oui</label>
                                            <input type="radio" class="form-check-input" id="RNonJeudi" name="inlineMaterialRadiosExample5"  @if($jeudi && $jeudi->acces=="0") checked @endif>
                                            <label class="form-check-label" for="materialInline2">Non</label>
                                        </div>


                                        <div id="plageJeudi" class="form-group"  @if($jeudi && $jeudi->acces=="0") style="display: none"  @endif>
                                            <label class="col-sm-2 control-label">Début</label>
                                            <div class="col-sm-3">
                                                <input type="time" id="timeJeudiD" class="form-control" name="debutJeudi"   value="{{$jeudi->heure_debut}}">
                                            </div>

                                            <label class="col-sm-2 control-label">fin</label>
                                            <div class="col-sm-3">
                                                <input type="time" id="timeJeudiF" class="form-control" name="finJeudi"   value="{{$jeudi->heure_fin}}">
                                            </div>


                                        </div>
                                    </div>

                                    <br>

                                    <div id="divsam">

                                        <h4>Vendredi</h4>

                                        <div style="margin-left: 3%;" class="form-check form-check-inline">
                                            <input type="radio" class="form-check-input" id="ROuiVendredi" name="inlineMaterialRadiosExample6" @if($vendredi && $vendredi->acces=="1") checked @endif>
                                            <label class="form-check-label" for="materialInline1">Oui</label>
                                            <input type="radio" class="form-check-input" id="RNonVendredi" name="inlineMaterialRadiosExample6"  @if($vendredi && $vendredi->acces=="0") checked @endif>
                                            <label class="form-check-label" for="materialInline2">Non</label>
                                        </div>


                                        <div id="plageVendredi"class="form-group" @if($vendredi && $vendredi->acces=="0") style="display: none"  @endif>
                                            <label class="col-sm-2 control-label">Début</label>
                                            <div class="col-sm-3">
                                                <input type="time" id="timeVendrediD" class="form-control" name="debutVendredi"   value="{{$vendredi->heure_debut}}">
                                            </div>

                                            <label class="col-sm-2 control-label">fin</label>
                                            <div class="col-sm-3">
                                                <input type="time" id="timeVendrediF" class="form-control" name="finVendredi"   value="{{$vendredi->heure_fin}}">
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