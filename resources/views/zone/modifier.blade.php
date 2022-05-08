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
                    <h3 class="box-title"><b>Modification de zone</b></h3>
                </div>

                <div class="box-body ">
                    {!! Form::open(['method'=>'POST','action' => ['ZoneController@update', $zone->ID]]) !!}
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </span>
                        <input type="text" class="form-control" name="libelle_zone" placeholder="Libelle zone" @if(Input::old('libelle_zone')) value="{{Input::old('libelle_zone')}}" @else value="{{$zone->LIBELLE_NIVEAU}}" @endif required>

                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-phone"></i>
                        </span>
                        {{--@if(Option::old('type')) value="{{Input::old('type')}}" @else value="{{$controleur->type}}" @endif    --}}
                        <input type="text" class="form-control" name="nombre_places_max" placeholder="Nombre de places max" @if(Input::old('nombre_places_max')) value="{{Input::old('nombre_places_max')}}" @else value="{{$zone->NB_PLACES_MAX}}" @endif required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fas fa-info"></i>
                        </span>

                        <input type="text"  class="form-control" name="nombre_places_dispo" placeholder="Nombre de places dispo" @if(Input::old('nombre_places_dispo')) value="{{Input::old('nombre_places_dispo')}}" @else value="{{$zone->NB_PLACES_DISPO}}" @endif required>
                        {{--<input type="text" class="form-control" name="id_niveau" placeholder="Niveau" value="{{Input::old('id_niveau')}}" required>--}}
                    </div>

                    <br>


                    <input type="submit" class="btn btn-flat btn-info pull-right" value="Valider">
                    <a href="{{ url('/zone/index') }}" class="btn btn-flat btn-warning pull-right" >Annuler</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@stop