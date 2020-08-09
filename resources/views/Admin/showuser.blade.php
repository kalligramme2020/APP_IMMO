@extends('layouts.master')
@section('content')
    <div class="container-fluid">

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="masquer-tab" data-toggle="tab" href="#masquer" role="tab" aria-controls="masquer" aria-selected="true">masquer</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " id="biens-tab" data-toggle="tab" href="#biens" role="tab" aria-controls="biens" aria-selected="false">ses biens</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="locataires-tab" data-toggle="tab" href="#locataires" role="tab" aria-controls="locataires" aria-selected="false">ses locataires</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">ses locations</a>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="masquer" role="tabpanel" aria-labelledby="masquer-tab">...</div>
{{--les bien du bailleur--}}
            <div class="tab-pane fade" id="biens" role="tabpanel" aria-labelledby="biens-tab">..
                <div class="row no-gutters ">
                    <div class="col-md-4 border-right">
                        <img src="" class="card-img" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <dl class="row ">
                                @foreach($userdetail->biens as $bien)
                                <dt class="col-sm-3 mt-3">Nom</dt>
                                <dd class="col-sm-9 mt-3">{{$bien->name}}</dd>

                                <dt class="col-sm-3 mt-3">addresse</dt>
                                <dd class="col-sm-9 mt-3">{{$bien->addresse}}</dd>

                                <dt class="col-sm-3 mt-3">surface</dt>
                                <dd class="col-sm-9 mt-3">{{$bien->surface}}</dd>
                                @endforeach
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
{{--les location du bailler --}}
            <div class="tab-pane fade" id="locataires" role="tabpanel" aria-labelledby="locataires-tab">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">nom</th>
                        <th scope="col">emails</th>
                        <th scope="col">CNI</th>
                        <th scope="col">Handle</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($userdetail->locataires as $locataire)
                    <tr>
                        <td>{{$locataire->nom}} {{$locataire->prenom}}</td>
                        <td>{{$locataire->email}}</td>
                        <td>{{$locataire->cni}}</td>
                        <td>{{$locataire->numero}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
{{--ses locataire--}}
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
        </div>

        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="card mb-3 col-md-12">

                    <div class="row no-gutters ">
                        <div class="col-md-4 border-right">
                            <img src="{{ asset('profil/default.jpg') }}" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <dl class="row ">
                                    <dt class="col-sm-3 mt-3">Nom</dt>
                                    <dd class="col-sm-9 mt-3">{{$userdetail->name}}</dd>

                                    <dt class="col-sm-3 mt-3">prenom</dt>
                                    <dd class="col-sm-9 mt-3">{{$userdetail->prenom}}</dd>

                                    <dt class="col-sm-3 mt-3">pays</dt>
                                    <dd class="col-sm-9 mt-3">{{$userdetail->nationalite}}</dd>

                                    <dt class="col-sm-3 mt-3">ville</dt>
                                    <dd class="col-sm-9 mt-3">{{$userdetail->ville}}</dd>

                                    <dt class="col-sm-3 mt-3">cni number</dt>
                                    <dd class="col-sm-9 mt-3">{{$userdetail->cni}}</dd>

                                    <dt class="col-sm-3 mt-3">email</dt>
                                    <dd class="col-sm-9 mt-3">{{$userdetail->email}}</dd>

                                </dl>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-10">
                    <div class="card ">
                        <div class="card-header">
                            <a href="{{route('admin.index')}} " class="btn btn-info">Retour</a>
                            <form
                                action="{{route('admin.destroy', $userdetail)}}" class="d-inline ml-2"  method="POST" onsubmit="return confirm('Etes vous sur de cette action?');">
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
