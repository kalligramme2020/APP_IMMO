@extends('layouts.app')
@section('content')
    <div id="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="float-right ">
                                <a href="{{route('rental.create')}}" class="btn btn-outline-secondary">Nouvel location</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row justify-content-center mt-5">
                <div class="col-md-11">
                    <div class="card">
                        <div class="card-header"></div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead class=" text-center">
                                <tr>
                                    <th scope="col">identifiant</th>
                                    <th scope="col">bien</th>
                                    <th scope="col">locataire</th>
                                    <th scope="col">loyer</th>
                                    <th scope="col">duree</th>
                                    <th scope="col">actions</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($locations as $location)
                                    <tr>
                                        <td><a href="{{route('rental.show',$location)}}" class="text-primary">{{$location->identifiant}} </a></td>
                                        <td>
                                            <a href="" >{{$location->bien->name}}</a>
                                        </td>
                                        <td class="text-primary">
                                            <a href="#"> {{$location->locataire->nom}} br {{$location->locataire->prenom}} <br> <em> {{$location->locataire->email}}</em> </a>
                                        </td>
                                        <td>{{$location->loyer_ac}}</td>
                                        <td>{{$location->debut_bail}} - {{$location->fin_bail}}</td>
                                        <th class="text-center">
                                            <div class="btn-group">
                                                <button class="btn btn-secondary btn-sm  " type="button" data-toggle="dropdown" aria-expanded="false">
                                                    actions
                                                </button>
                                                <div class="dropdown-menu">

                                                    <a href="{{route('rental.edit',$location)}}" class="dropdown-item"><i class="fas fa-edit fa-sm"> </i> modifier</a>

                                                    <a href="{{route('payment.index')}}" class="dropdown-item"> <i class="fa fa-eur" aria-hidden="true"></i> finances</a>

                                                    <form
                                                        action="{{route('rental.destroy', $location)}}"  method="POST" onsubmit="return confirm('Etes vous sur de cette action?');">
                                                        {{csrf_field()}}{{method_field('delete')}}
                                                        <button type="submit" class="dropdown-item"> <i class="fas fa-trash-alt fa-sm"></i> suprimer</button>
                                                    </form>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Autres</a>
                                                </div>
                                            </div>
                                        </th>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


