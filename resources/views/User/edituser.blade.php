@extends('layouts.app')
@section('content')
    <div id="content">
        <div></div>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-right ">
                                mofifier votre compte
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
                            <form action="{{ route('user.update', $edituser->id) }} " method="POST" enctype="multipart/form-data">
                                @csrf
                                {{method_field('PUT')}}
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="nom">Noms</label>
                                        <input type="text" class="form-control" id="nom" name="username" value="{{$edituser->name}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="prenon">Prenoms</label>
                                        <input type="text" class="form-control" id="prenon" name="userprenom" value="{{$edituser->prenom}}">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="Email4">Email</label>
                                        <input type="email" class="form-control" id="Email4" name="useremail" value="{{$edituser->email}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="phone">Numero de telephone</label>
                                        <input type="number" class="form-control" id="phone" name="userphone" value="{{$edituser->numero}}">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="pays">nationalité</label>
                                        <input type="text" class="form-control" id="pays" name="userpays" value="{{$edituser->pays}}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="ville">ville</label>
                                        <input type="text" class="form-control" id="ville" name="userville" value="{{$edituser->ville}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="cni">Numero CNI</label>
                                        <input type="number" class="form-control" id="cni" name="usercni" value="{{$edituser->cni}}">
                                    </div>
                                </div>

                                <div class="form-row justify-content-between" >
                                    <div class="form-group">
                                        <label for="example">Photo</label>
                                        <input type="file" class="form-control-file" id="input_file" name="file">
                                    </div>

                                    <div class="form-group">
                                        <img src="{{ asset('profil/') }}/{{$edituser->profil}}" class="rounded float-right" alt="your profil" id="preview_file" width="25%">
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <a href="{{route('user.index')}}" class="btn bg-danger">retour</a>
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                </div>

                            </form>

                        </div>
                        <div class="card-footer">

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection



