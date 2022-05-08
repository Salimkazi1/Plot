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
                    <h3 class="box-title"><b>Ajout d'une plage horaire </b></h3>
                </div>

                <div class="box-body ">
                    {!! Form::open(['method'=>'POST','action' => ['PlageHoraireController@store']]) !!}
                    <input type="hidden" id="navbarSelected" name="navbarSelected" value="h">
                    <input type="hidden"  id="radioSelected" name="TradioSelected" value="radiofixe">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Libelle</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" name="libelle" placeholder="Libelle"  value="{{old('libelle')}}">
                        </div>
                    </div>


                    <br><br>
                    <ul class="nav nav-tabs">
                        <li class="nav-item" >
                            <a class="nav-link active" data-toggle="tab" id="IDnavbarParHeure" href="#navbarParHeure">par heure</a>
                        </li>
                        <li class="nav-item" >
                            <a class="nav-link" data-toggle="tab" id="IDnavbarParJour" href="#navbarParJour">Par jour</a>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane container active" id="navbarParHeure">
                            <div id="sectionHeure">
                                <br>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" id="Rfixe" name="inlineMaterialRadiosExample">
                                    <label class="form-check-label" for="materialInline1">fixe</label>
                                </div>

                                <!-- Material inline 2 -->
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" id="Rplusque" name="inlineMaterialRadiosExample">
                                    <label class="form-check-label" for="materialInline2">plusque</label>
                                </div>



                                <div id="Sectionfixe">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Tarif</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" name="tarifFixe" placeholder="Tarif"  value="{{old('tarifFixe')}}">
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Début</label>
                                        <div class="col-sm-2">
                                            <input type="time" class="form-control" name="debut"   value="{{old('debut')}}">
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Fin</label>
                                        <div class="col-sm-2">
                                            <input type="time" class="form-control" name="fin"   value="{{old('fin')}}">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div id="Sectionplusque" >
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">A partir de </label>
                                        <div class="col-sm-2">
                                            <input type="time" class="form-control" name="heure_apartir"  value="{{old('heure_apartir')}}">
                                        </div>
                                    </div>
                                    <br><br>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Tarif</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" name="tarif_plus_que" placeholder="Tarif"  value="{{old('tarif_plus_que')}}">
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Tarif pour chaque 30min supplémentaire</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" name="tarif_supp" placeholder="Tarif supplémentaire"  value="{{old('tarif_supp')}}">
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                        <div class="tab-pane container fade" id="navbarParJour">
                            <div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tarif par jour</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" name="tarif_jour" placeholder="Tarif par jour"  value="{{old('tarif_jour')}}">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>




                    <br>



                    <input type="submit" class="btn btn-flat btn-info pull-right" value="Valider">
                    <a href="{{ url('/plagehoraire/index') }}" class="btn btn-flat btn-warning pull-right" >Annuler</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>

<script type="text/javascript">
     j="h";
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
    function showSectionFixe()
    {
        $('#Sectionplusque').hide();
        $('#Sectionfixe').show();
        $('#radioSelected').val("radiofixe");
    }
    function showSectionPlusque()
    {
        // alert("test");

        $("#radioSelected").val("radioplusque");
        $('#Sectionplusque').show();
        $('#Sectionfixe').hide();
    }
        $('#Rfixe').click(function() {
            showSectionFixe();
        });

        $('#Rplusque').click(function() {
            showSectionPlusque();
        });


</script>
@stop

