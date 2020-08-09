@extends('layouts.app')
@section('content')
    <div id="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-right ">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row justify-content-center mt-5">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"></div>
                        <div class="card-body">

                            <div class="row no-gutters ">
                                <div class="col-md-4 border-right">
                                    @foreach($users as $user)

                                    <img src="{{ asset('profil/') }}/{{$user->profil}}" class="card-img" alt="...">
                                    @endforeach
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <dl class="row ">
                                            @foreach($users as $user)
                                            <dt class="col-sm-3 mt-3">Nom</dt>
                                            <dd class="col-sm-9 mt-3">{{$user->name}}</dd>

                                            <dt class="col-sm-3 mt-3">prenom</dt>
                                            <dd class="col-sm-9 mt-3">{{$user->prenom}}</dd>

                                            <dt class="col-sm-3 mt-3">nationalité</dt>
                                            <dd class="col-sm-9 mt-3">{{$user->pays}}</dd>

                                            <dt class="col-sm-3 mt-3">ville</dt>
                                            <dd class="col-sm-9 mt-3">{{$user->ville}}</dd>

                                            <dt class="col-sm-3 mt-3">CNI</dt>
                                            <dd class="col-sm-9 mt-3">{{$user->cni}}</dd>

                                            <dt class="col-sm-3 mt-3">email</dt>
                                            <dd class="col-sm-9 mt-3">{{$user->email}}</dd>

                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{route('user.edit',$user->id)}}"  class="btn btn-outline-primary ml-2">modifier mon compte</a>
                            <form class="d-inline"
                                action="{{route('user.destroy',$user->id)}}"  method="POST" onsubmit="return confirm('Etes vous sur de cette action?');">
                                {{csrf_field()}}{{method_field('delete')}}
                                <button type="submit" class="btn btn-outline-danger"> supprimmer mon compte</button>
                            </form>
                            <a href="{{route('password')}}"  class="btn btn-outline-secondary ml-2">changer mon mots de passe</a>
                            <a href="{{route('user.index')}}"  class="btn btn-outline-secondary ml-2"> retour</a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection



