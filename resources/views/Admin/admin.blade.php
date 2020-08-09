@extends('layouts.master')

@section('content')
    <div class="">
        <div class="container-fluid ">

            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{ __('Dashboard') }}</div>

                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead class="text-center">
                                <tr>
                                    <th scope="col">noms</th>
                                    <th scope="col">email</th>
                                    <th scope="col">addresse</th>
                                    <th scope="col">action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as  $user)
                                <tr>
                                    <td class="text-primary">
                                        <a href="{{route('admin.show', $user)}}" >{{$user->name}}</a>
                                    </td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->telephone}}</td>

                                    <td class="text-center">
                                        <div class="btn-group">
                                            <button class="btn btn-secondary btn-sm " type="button" data-toggle="dropdown" aria-expanded="false">
                                                <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a href="" class="dropdown-item"><i class="fa fa-toggle-on" aria-hidden="true"></i> desactiver</a>
                                                <form
                                                    action="{{route('admin.destroy', $user)}}"  method="POST" onsubmit="return confirm('Etes vous sur de cette action?');">
                                                    {{csrf_field()}}{{method_field('delete')}}
                                                    <button type="submit" class="dropdown-item"> <i class="fas fa-trash-alt fa-sm"></i> suprimer</button>
                                                </form>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Autres</a>
                                            </div>
                                        </div>
                                    </td>
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
