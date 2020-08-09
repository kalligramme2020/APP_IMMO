@extends('layouts.app')
@section('content')
    <div id="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-right ">
                                <a href="{{route('tenant.create')}}" class="btn btn-outline-secondary">Nouveau locataire</a>
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
                                    <th scope="col">type du bien</th>
                                    <th scope="col">Locataire</th>
                                    <th scope="col"> action </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tenants as $tenant)
                                    <tr>
                                        <td>
                                            <img src="{{ asset('profil/') }}/{{$tenant->photo}}" alt="Avatar" class="avatar">
                                            <a href="{{route('tenant.show', $tenant->id)}}" class="text-primary">{{$tenant->nom}},{{$tenant->prenom}}</a>
                                        </td>
                                        <td>{{$tenant->email}}</td>
                                        <td>{{$tenant->numero}}</td>
                                        <th class="text-center">
                                            <div class="btn-group">
                                                <button class="btn btn-secondary btn-sm " type="button" data-toggle="dropdown" aria-expanded="false">
                                                    actions
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a href="{{route('tenant.edit', $tenant->id)}}" class="dropdown-item"><i class="fas fa-edit fa-sm"> </i> modifier</a>
                                                    <form
                                                        action="{{route('tenant.destroy', $tenant)}}"  method="POST" onsubmit="return confirm('Etes vous sur de cette action?');">
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


