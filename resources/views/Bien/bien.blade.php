@extends('layouts.app')
@section('content')
    <div id="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-right ">
                                <a href="{{route('house.create')}}" class="btn btn-outline-secondary">Nouveau bien</a>
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
                                    <th scope="col">Nom</th>
                                    <th scope="col">Adresse</th>
                                    <th scope="col">ville</th>
                                    <th scope="col"> action </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($biens as $bien)

                                    <tr>
                                        <td>
                                            <img src="{{ asset('profil/') }}/{{$bien->photo}}"  class="avatar">
                                            <a href="{{route('house.show', $bien->id)}}" class="text-primary">{{$bien->name}}</a>
                                        </td>
                                        @if($bien->parentid !== null)
                                            <td>{{$bien->parentid->addresse}}</td>
                                        @elseif($bien->parentid == null)
                                            <td>{{$bien->addresse}}</td>
                                        @endif
                                        <td>{{$bien->ville}}</td>
                                        <th class="text-center">
                                            <div class="btn-group">
                                                <button class="btn btn-secondary btn-sm " type="button" data-toggle="dropdown" aria-expanded="false">
                                                    actions
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a href="{{route('house.edit', $bien->id)}}" class="dropdown-item"><i class="fas fa-edit fa-sm"> </i> modifier</a>
                                                    <form
                                                        action="{{route('house.destroy', $bien)}}"  method="POST" onsubmit="return confirm('Etes vous sur de cette action?');">
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


