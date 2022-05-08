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
                    <h3 class="box-title"><b>Modification d'utilisateur</b></h3>
                </div>

                <div class="box-body ">
                    {!! Form::open(['method'=>'POST','action' => ['UtilisateurController@update', $user->id]]) !!}
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                        </span>
                        <input type="text" class="form-control" name="nom" placeholder="Nom" @if(Input::old('nom')) value="{{Input::old('nom')}}" @else value="{{$user->nom}}" @endif required>
                        <input type="text" class="form-control" name="prenom" placeholder="Prénom" @if(Input::old('prenom')) value="{{Input::old('prenom')}}" @else value="{{$user->prenom}}" @endif required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-phone"></i>
                        </span>
                        <input type="text" class="form-control" name="telephone" placeholder="Téléphone" @if(Input::old('telephone')) value="{{Input::old('telephone')}}" @else value="{{$user->telephone}}" @endif required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa- fa-envelope-square"></i>
                        </span>
                        <input type="email" class="form-control" name="email" placeholder="Email" @if(Input::old('email')) value="{{Input::old('email')}}" @else value="{{$user->email}}" @endif required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-unlock-alt"></i>
                        </span>
                        <input type="text" class="form-control" name="login" placeholder="Identifiant" @if(Input::old('login')) value="{{Input::old('login')}}" @else value="{{$user->login}}" @endif required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user-secret"></i>
                        </span>
                        <input type="password" class="pwd form-control" name="password" id="pass" placeholder="mot de passe" value="">
                        <span class="input-group-btn">
                            <button class="btn btn-default reveal" type="button" onmousedown="reveal();" onmouseup="reveal2()"><i class="glyphicon glyphicon-eye-open"></i></button>
                        </span>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-user" ></i>
                        </span>
                        <select class="form-control" name="profil" placeholder="Profil" required>
                            <option value="1" @if(Input::old('profil') == 1) selected @elseif($user->idProfil == 1) selected @endif>Administrateur</option>
                            <option value="2" @if(Input::old('profil') == 2) selected @elseif($user->idProfil == 2) selected @endif>Contrôleur</option>
                        </select>
                    </div>
                    <br>
                    <input type="submit" class="btn btn-flat btn-info pull-right" value="Valider">
                    <a href="{{ url('/utilisateur/index') }}" class="btn btn-flat btn-warning pull-right" >Annuler</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@stop