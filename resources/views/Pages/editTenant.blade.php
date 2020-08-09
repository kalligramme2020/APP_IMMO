@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        @include('flashy::message')
        <div class = "page-header text-center">
            <h4> Modifier locataire</h4>
        </div>
        <div class="dropdown-divider"></div>
        <div class="jumbotron"><div class="text-right"> </div></div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-5">
                    <div class="card-header">Informations generales</div>
                    <div class="card-body">
                        <form action="{{ route('tenant.update', $editTenent->id) }} " method="POST" enctype="multipart/form-data">
                            @csrf
                            {{method_field('PUT')}}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nom">Noms</label>
                                    <input type="text" class="form-control" id="nom" name="nom" value="{{$editTenent->nom}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="prenon">Prenoms</label>
                                    <input type="text" class="form-control" id="prenon" name="prenom" value="{{$editTenent->prenom}}">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="Email4">Email</label>
                                    <input type="email" class="form-control" id="Email4" name="email" value="{{$editTenent->email}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone">Numero de telephone</label>
                                    <input type="number" class="form-control" id="phone" name="phone" value="{{$editTenent->numero}}">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="pays">nationalité</label>
                                    <input type="text" class="form-control" id="pays" name="pays" value="{{$editTenent->nationalite}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="cni">Numero CNI</label>
                                    <input type="number" class="form-control" id="cni" name="cni" value="{{$editTenent->cni}}">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="City">Profession</label>
                                    <input type="text" class="form-control" id="City" name="proff" value="{{$editTenent->profession}}">
                                </div>
                            </div>

                            <div class="form-row justify-content-between" >
                                <div class="form-group">
                                    <label for="example">Photo</label>
                                    <input type="file" class="form-control-file" id="exampl" name="file">
                                </div>

                                <div class="form-group col-md-6 text-center" >
                                    <img src="..." class="rounded  rounded" alt="your profil" id="preview_file" width="50%">
                                </div>
                            </div>

                            <div class="mt-5">
                                <a href="{{route('tenant.index')}}" class="btn bg-danger">retour</a>
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

