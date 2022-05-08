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
                    <h3 class="box-title"><b>Ajout de contrôleur</b></h3>
                </div>

                <div class="box-body ">
                    {!! Form::open(['method'=>'POST','action' => ['ControleurController@store']]) !!}
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fas fa-at"></i>
                        </span>
                        <input type="text" id="ip" class="form-control" name="adresse_ip" placeholder="Adresse IP" value="{{Input::old('adresse_ip')}}" required>


                    </div>



                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-phone"></i>
                        </span>
                        <select class="form-control" name="type" required>
                            <option value="" disabled selected>Sélectionner le type (E/S)...</option>

                            <option value="entree"> Entrée </option>
                            <option value="sortie"> Sortie </option>

                        </select>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fas fa-info"></i>
                        </span>
                        <select class="form-control" name="id_niveau" required>
                            <option value="" disabled selected>Sélectionner le niveau ...</option>
                            @foreach($niveaux as $niveau)
                                <option value="{{$niveau->ID}}" @if(Input::old("id_niveau")) selected @endif> {{$niveau->LIBELLE_NIVEAU}} </option>
                            @endforeach
                        </select>

                        {{--<input type="text" class="form-control" name="id_niveau" placeholder="Niveau" value="{{Input::old('id_niveau')}}" required>--}}
                    </div>


                    <br>

                    <input type="button" name="msubmit" class="btn btn-flat btn-info pull-right" value="Valider" onclick="ValidateIPaddress()">
                    <a href="{{ url('/controleur/index') }}" class="btn btn-flat btn-warning pull-right" >Annuler</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>

            <script>


                function ValidateIPaddress()
                {
                    var ipformat = /^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/;
                    if (document.getElementById("ip").value.match(ipformat))
                    {
                        // alert("test");
                        $("input[name='msubmit']").prop("type", "submit");
                    }
                    else{
                        // alert("test");
                        document.getElementById("ip").setCustomValidity("Format non respecté! veuillez introduire un format d'adresse ip valide");
                        return false;
                    }
                     document.getElementById("ip").setCustomValidity("");

                }

            </script>



    </section>

@stop