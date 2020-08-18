@extends('layouts.app')
@section('content')
 <div class="container-fluid">
     <div class="container">
         <div class="row justify-content-center mt-5">
             <div class="card mb-3 col-md-12">

                 <div class="row no-gutters ">
                     <div class="col-md-4 border-right">
                         <img src="{{ asset('profil/') }}/{{$TenentSchow->photo}}" class="card-img" alt="...">
                     </div>
                     <div class="col-md-8">
                         <div class="card-body">
                             <dl class="row pl-5 ">
                                 <dt class="col-sm-3 mt-3">Nom</dt>
                                 <dd class="col-sm-9 mt-3">{{$TenentSchow->nom}}</dd>

                                 <dt class="col-sm-3 mt-3">prenom</dt>
                                 <dd class="col-sm-9 mt-3">{{$TenentSchow->prenom}}</dd>


                                 <dt class="col-sm-3 mt-3">Email</dt>
                                 <dd class="col-sm-9 mt-3">{{$TenentSchow->email}}</dd>

                                 <dt class="col-sm-3 mt-3 text-truncate">Numero de CNI</dt>
                                 <dd class="col-sm-9 mt-3">{{$TenentSchow->cni}}</dd>

                                 <dt class="col-sm-3 mt-3 text-truncate">profession</dt>
                                 <dd class="col-sm-9 mt-3">{{$TenentSchow->profession}}</dd>

                                 <dt class="col-sm-3 mt-3 text-truncate">nationalité</dt>
                                 <dd class="col-sm-9 mt-3">{{$TenentSchow->nationalite}}</dd>

                                 <dt class="col-sm-3 mt-3 text-truncate">ville</dt>
                                 <dd class="col-sm-9 mt-3">{{$TenentSchow->ville}}</dd>

                                 <dt class="col-sm-3 mt-3">Telephone</dt>
                                 <dd class="col-sm-9 mt-3">
                                     <dl class="row">
                                         <dt class="col-sm-4">{{$TenentSchow->photo}}</dt>

                                     </dl>
                                 </dd>
                             </dl>
                         </div>
                     </div>
                 </div>
             </div>


             <div class="col-md-10">
                 <div class="card ">
                     <div class="card-header">
                         <a href="{{route('tenant.index')}} " class="btn btn-info">Retour</a>

                         <a href="{{route('tenant.edit', $TenentSchow->id)}}" class="btn btn-warning ml-2"> Modifier</a>

                         <form
                             action="{{route('tenant.destroy', $TenentSchow)}}" class="d-inline ml-2"  method="POST" onsubmit="return confirm('Etes vous sur de cette action?');">
                             {{csrf_field()}}{{method_field('delete')}}
                             <button type="submit" class="btn btn-danger">suprimer</button>
                         </form>
                     </div>

                 </div>
             </div>
         </div>

     </div>
 </div>
@endsection
