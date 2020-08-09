@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class = "page-header text-center">
            <h4> Nouveau locataire</h4>
        </div>
        <div class="dropdown-divider"></div>


        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-5">
                    <div class="card-header">Informations generales</div>

                    <div class="card-body">

                        <form action="{{ route('tenant.store') }} " method="POST" enctype="multipart/form-data">
                            @csrf

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="nom">Noms</label>
                                        <input type="text" class="form-control" id="nom" name="nom">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="prenon">Prenoms</label>
                                        <input type="text" class="form-control" id="prenon" name="prenom">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="Email4">Email</label>
                                        <input type="email" class="form-control" id="Email4" name="email">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="phone">Numero de telephone</label>
                                        <input type="number" class="form-control" id="phone" name="phone">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="pays">nationalité</label>
                                        <input type="text" class="form-control" id="pays" name="pays">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="cni">Numero CNI</label>
                                        <input type="number" class="form-control" id="cni" name="cni">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="City">Profession</label>
                                        <input type="text" class="form-control" id="City" name="proff">
                                    </div>
                                </div>

                                <div class="form-row justify-content-between" >
                                    <div class="form-group  col-md-6">
                                        <label for="example">Photo</label>
                                        <input type="file" class="form-control-file" id="input_file" name="file">
                                    </div>

                                    <div class="form-group col-md-6 text-center" >
                                        <img class="rounded" alt="your profil" id="preview_file" width="50%">
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
