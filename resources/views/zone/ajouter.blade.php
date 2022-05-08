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
                    <h3 class="box-title"><b>Ajout de zone</b></h3>
                </div>

                <div class="box-body ">
                    {!! Form::open(['method'=>'POST','action' => ['ZoneController@store']]) !!}
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fas fa-at"></i>
                        </span>
                        <input type="text"  class="form-control" name="libelle_niveau" placeholder="Libellé niveau" value="{{Input::old('libelle_niveau')}}" required>


                    </div>



                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-phone"></i>
                        </span>
                        <input type="text"  class="form-control" name="nombre_places_max" placeholder="Nombre maximum de places" value="{{Input::old('nombre_places_max')}}" required>
                    </div>
                    <br>



                    <br>

                    <input type="submit" class="btn btn-flat btn-info pull-right" value="Valider" ">
                    <a href="{{ url('/zone/index') }}" class="btn btn-flat btn-warning pull-right" >Annuler</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>





    </section>

@stop