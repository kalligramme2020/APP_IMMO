@extends('layouts.app')
@section('content')
    <div id="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4>details sur le bien: {{$showbien->name}} </h4>
                            <div class="float-right mr-5 ">

                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row justify-content-center mt-5">
                <div class="col-md-10">
                    <div class="card">
                        <div class="row no-gutters">
                            <div class="col-md-4 border-right">
                                <img src="{{ asset('profil/') }}/{{$showbien->photo}}" class="card-img" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <dl class="row pl-5">
                                        @if($showbien->parentid !== null)
                                            <dt class="col-sm-3 mt-3">appartient a</dt>
                                            <dd class="col-sm-9 mt-3">{{$showbien->parentid->name}}</dd>
                                        @endif

                                        <dt class="col-sm-3 mt-3">Nom du bien</dt>
                                        <dd class="col-sm-9 mt-3">{{$showbien->name}}</dd>

                                        <dt class="col-sm-3 mt-3">type du bien</dt>
                                        <dd class="col-sm-9 mt-3">{{$showbien->tbien->name}}</dd>


                                        <dt class="col-sm-3 mt-3">adresse</dt>
                                        <dd class="col-sm-9 mt-3">{{$showbien->addresse}}</dd>

                                        <dt class="col-sm-3 mt-3 text-truncate">ville</dt>
                                        <dd class="col-sm-9 mt-3">{{$showbien->ville}}</dd>

                                        <dt class="col-sm-3 mt-3 text-truncate">region</dt>
                                        <dd class="col-sm-9 mt-3">{{$showbien->region}}</dd>

                                        @foreach($showbien->pieces as $piece)
                                            @if($showbien->tbien->name !== 'himeuble')
                                                <dt class="col-sm-3 mt-3 text-truncate">chambre</dt>
                                                <dd class="col-sm-9 mt-3">{{$piece->chambre}}</dd>

                                                <dt class="col-sm-3 mt-3 text-truncate">salon</dt>
                                                <dd class="col-sm-9 mt-3">{{$piece->salon}}</dd>

                                                <dt class="col-sm-3 mt-3 text-truncate">salle de bain</dt>
                                                <dd class="col-sm-9 mt-3">{{$piece->salle_bain}}</dd>

                                                <dt class="col-sm-3 mt-3">cuisine</dt>
                                                <dd class="col-sm-9 mt-3">
                                                    <dl class="row">
                                                        <dt class="col-sm-4">{{$piece->cuisine}}</dt>
                                                    </dl>
                                                </dd>
                                            @elseif($showbien->tbien->name === 'himeuble')
                                                <dt class="col-sm-3 mt-3 text-truncate">appartement</dt>
                                                <dd class="col-sm-9 mt-3">{{$piece->appartement}}</dd>

                                                <dt class="col-sm-3 mt-3 text-truncate"> capacite du parking</dt>
                                                <dd class="col-sm-9 mt-3">{{$piece->parking}}</dd>

                                                <dt class="col-sm-3 mt-3 text-truncate">studio</dt>
                                                <dd class="col-sm-9 mt-3">{{$piece->studio}}</dd>

                                                <dt class="col-sm-3 mt-3 text-truncate">magasin</dt>
                                                <dd class="col-sm-9 mt-3">{{$piece->magasin}}</dd>
                                            @endif

                                            @if($showbien->enfantsid !== null)
                                                    <h6>liste des biens d cette himeuble: </h6>
                                                @foreach($showbien->enfantsid as $enfantid)
                                                        <a href="{{route('house.show', $enfantid->id)}}" class="text-primary ml-2" >{{$enfantid->name}}</a>
{{--                                                    <dd class="col-sm-9 mt-3 text-danger font-weight-bold d-block" >{{$enfantid->name}}</dd>--}}
                                                @endforeach
                                            @endif
                                        @endforeach

                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-10">
                    <div class="card ">
                        <div class="card-header">
                            <a href="{{route('house.index')}}" class="btn btn-info">Retour</a>

                            <a href="{{route('house.edit', $showbien->id)}}" class="btn btn-warning ml-2"> Modifier</a>

                            <form
                                action="" class="d-inline ml-2"  method="POST" onsubmit="return confirm('Etes vous sur de cette action?');">
                                {{csrf_field()}}{{method_field('delete')}}
                                <button type="submit" class="btn btn-danger">suprimer</button>
                            </form>
                        </div>
                        <div class="card-body ">
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>
@endsection


