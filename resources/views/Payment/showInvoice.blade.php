@extends('layouts.app')
@section('content')
    <div id="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row no-gutters ">
                                <div class="col-md-4 border-right">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <dl class="row pl-5 ">
                                            <dt class="col-sm-3 mt-3">locataire</dt>
                                            <dd class="col-sm-9 mt-3">{{$showInvice->locataire}}</dd>

                                            <dt class="col-sm-3 mt-3">bien</dt>
                                            <dd class="col-sm-9 mt-3">{{$showInvice->bien}}</dd>


                                            <dt class="col-sm-3 mt-3">location</dt>
                                            <dd class="col-sm-9 mt-3">{{$showInvice->location->identifiant}}</dd>

                                            <dt class="col-sm-3 mt-3 text-truncate">debut</dt>
                                            <dd class="col-sm-9 mt-3">{{$showInvice->debut}}</dd>

                                            <dt class="col-sm-3 mt-3 text-truncate">fin</dt>
                                            <dd class="col-sm-9 mt-3">{{$showInvice->fin}}</dd>

                                            <dt class="col-sm-3 mt-3 text-truncate">avance en cfa</dt>
                                            <dd class="col-sm-9 mt-3">{{$showInvice->avance}}</dd>

                                            <dt class="col-sm-3 mt-3 text-truncate">reste en cfa</dt>
                                            <dd class="col-sm-9 mt-3">{{$showInvice->reste}}</dd>

                                            <dt class="col-sm-3 mt-3 text-truncate">total en cfa</dt>
                                            <dd class="col-sm-9 mt-3">{{$showInvice->total}}</dd>

                                            <dt class="col-sm-3 mt-3 text-truncate">fait le:</dt>
                                            <dd class="col-sm-9 mt-3 text-primary">{{$showInvice->fait_le}}</dd>

                                            <dt class="col-sm-3 mt-3 text-truncate">par:</dt>
                                            <dd class="col-sm-9 mt-3 text-danger">le baillieur</dd>


                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row justify-content-center mt-5">
                <div class="col-md-11">


                </div>
            </div>

        </div>
    </div>
@endsection



