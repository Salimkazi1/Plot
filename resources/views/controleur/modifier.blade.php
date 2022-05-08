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
                    <h3 class="box-title"><b>Modification de contrôleur</b></h3>
                </div>

                <div class="box-body ">
                    {!! Form::open(['method'=>'POST','action' => ['ControleurController@update', $controleur->id]]) !!}
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </span>
                        <input type="text" class="form-control" name="adresse_ip" placeholder="Adresse IP" @if(Input::old('adresse_ip')) value="{{Input::old('adresse_ip')}}" @else value="{{$controleur->adresse_ip}}" @endif required>

                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-phone"></i>
                        </span>
                        {{--@if(Option::old('type')) value="{{Input::old('type')}}" @else value="{{$controleur->type}}" @endif    --}}
                        <select type="text" class="form-control" name="type" placeholder="Type"  required>
                            <option value="" disabled selected>Sélectionner le type (E/S) ...</option>
                            @foreach($niveaux as $niveau)
                                <option value="{{$niveau->ID}}" @if($niveau->ID == $controleur->id_niveau ) selected @endif> {{$niveau->LIBELLE_NIVEAU}} </option>
                            @endforeach
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
                                <option value="{{$niveau->ID}}" @if($niveau->ID == $controleur->id_niveau ) selected @endif> {{$niveau->LIBELLE_NIVEAU}} </option>
                            @endforeach
                        </select>

                        {{--<input type="text" class="form-control" name="id_niveau" placeholder="Niveau" value="{{Input::old('id_niveau')}}" required>--}}
                    </div>

                    <br>


                    <input type="submit" class="btn btn-flat btn-info pull-right" value="Valider">
                    <a href="{{ url('/controleur/index') }}" class="btn btn-flat btn-warning pull-right" >Annuler</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@stop