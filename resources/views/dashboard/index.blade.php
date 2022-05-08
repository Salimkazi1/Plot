@extends('app')
@section('content')

    <section class="content-header">
        <h1>Dashboard</h1>
    </section>

    <!-- Main content -->
    <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>{{$countUser}}</h3>
                            <p>Utilisateurs</p>
                        </div>
                        <div class="icon">
                            <i class="icon ion-person-stalker"></i>
                        </div>
                        <a href="{{URL('/utilisateur/index')}}" class="small-box-footer">Détails<i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>{{$countAbonne}}</h3>
                            <p>Abonnés</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-people"></i>
                        </div>
                        <a href="{{URL('/abonne/index')}}" class="small-box-footer">Détails<i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>{{$countControleur}}</h3>
                            <p>Contrôleurs</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-settings"></i>
                        </div>
                        <a href="{{URL('/controleur/index')}}" class="small-box-footer">Détails<i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->

                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>65</h3>
                            <p>Unique Visitors</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div><!-- ./col -->

            </div><!-- /.row -->
    </section><!-- /.content -->



@endsection