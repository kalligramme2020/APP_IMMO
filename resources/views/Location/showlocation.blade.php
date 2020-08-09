@extends('layouts.app')
@section('content')
    <div id="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            details sur cette location
                            <div class="float-right ">
                                <a href="{{route('rental.index')}}" class=" btn btn-outline-primary mr-5"> retour</a>
                                <a href="{{route('state.create')}}" class=" btn btn-outline-success mr-5">Eta des lieux</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row justify-content-center mt-5">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <h3>{{$showlocation->identifiant}}</h3>
                            <p>{{$showlocation->residence2}}</p>
                            <p> durée: {{$showlocation->debut_bail}} - {{$showlocation->fin_bail}}</p>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">

                            <dl class="row pl-5 ">
                                <dt class="col-sm-3 mt-3">proprietaire</dt>
                                <dd class="col-sm-9 mt-3">{{$showlocation->bailler->name}} {{$showlocation->bailler->email}} </dd>

                                <dt class="col-sm-3 mt-3">locataire</dt>
                                <dd class="col-sm-9 mt-3">{{$showlocation->locataire->nom}}</dd>


                                <dt class="col-sm-3 mt-3">bien louer</dt>
                                <dd class="col-sm-9 mt-3">{{$showlocation->bien->name}}</dd>

                                <dt class="col-sm-3 mt-3 text-truncate">loyer hors charge</dt>
                                <dd class="col-sm-9 mt-3">{{$showlocation->loyer_hc}}</dd>

                                <dt class="col-sm-3 mt-3 text-truncate">loyer avec charge</dt>
                                <dd class="col-sm-9 mt-3">{{$showlocation->loyer_ac}}</dd>

                                <dt class="col-sm-3 mt-3 text-truncate">garantir</dt>
                                <dd class="col-sm-9 mt-3">{{$showlocation->garantir}}</dd>

                                <dt class="col-sm-3 mt-3 text-truncate">residence</dt>
                                <dd class="col-sm-9 mt-3">{{$showlocation->residence2}}</dd>

                                <dt class="col-sm-3 mt-3 text-truncate">type de bail</dt>
                                <dd class="col-sm-9 mt-3">{{$showlocation->type_bail}}</dd>

                            </dl>

                        </div>
                    </div>



                    <div class="card">
                        <div class="card-header">
                            Etat des lieux
                            <a href="{{route('state.create')}}" class=" btn btn-outline-success ml-5">Eta des lieux</a>
                        </div>
                        <div class="card-body">
                            @foreach($showlocation->etats as $etat)
                                <img src="{{ asset('profil/') }}/{{$etat->photo}}"  alt="..." width="20%">
                            @endforeach

                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>
@endsection



