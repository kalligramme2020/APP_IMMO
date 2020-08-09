@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class = "page-header text-center">
            <h4> Nouveau bien</h4>
        </div>
        <div class="dropdown-divider"></div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-5">
                    <form action="{{ route('house.store') }} " method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">Informations generales</div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-8" id="type">
                                    <label for="type">type du bien</label>
                                    <select class="form-control" id="type" name="typebien">
                                        <option></option>
                                        @foreach($tbiens as $tbien)
                                        <option value="{{$tbien->id}}">{{$tbien->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="non">Nom</label>
                                    <input type="text" class="form-control" id="non" name="name" >
                                </div>

                                <div class="form-group col-md-4 ml-5" >
                                    <label for="type">Appartient a</label>
                                    <select class="form-control"  name="bienParent">
                                        <option></option>
                                        @foreach($parents as $parent)
                                            <option value="{{$parent->id}}">{{$parent->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-header">Address</div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nom">addresse</label>
                                    <input type="text" class="form-control" id="nom" name="addresse">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="pre">ville</label>
                                    <input type="text" class="form-control" id="pre" name="ville">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="prenon">pays</label>
                                    <select class="form-control" id="type" name="pays">
                                        <option></option>
                                        @foreach($pays as $land)
                                            <option value="{{$land->id}}">{{$land->pays}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="prenon">region</label>
                                    <input type="text" class="form-control" id="prenon" name="region">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="prenon">surface M²</label>
                                    <input type="number" class="form-control" id="prenon" name="surface">
                                </div>
                                <div class="form-group col-md-8">
                                    <label for="desc">description</label>
                                    <textarea class="form-control" id="desc" rows="3" name="description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-header">photo</div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group  col-md-6">
                                    <label for="example">Photo</label>
                                    <input type="file" class="form-control-file" id="input_file" name="file">
                                </div>

                                <div class="form-group col-md-6">
                                    <img src="..." class="rounded float-right rounded" alt="your profil" id="preview_file" width="25%">
                                </div>
                            </div>
                        </div>
                         <div class="cache">
                            <div class="card-header">cas himeuble</div>
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="appt">Appartement</label>
                                        <input type="number" class="form-control" id="appt" name="appart">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="studio">studio</label>
                                        <input type="number" class="form-control" id="studio" name="studio">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="prenon">appartement meuble</label>
                                        <input type="number" class="form-control" id="prenon" name="meuble">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="magasin">magasin</label>
                                        <input type="number" class="form-control" id="magasin" name="magasin">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="salle">salle de banquet</label>
                                        <input type="number" class="form-control" id="salle" name="banquet">
                                    </div>
                                </div>
                            </div>
                         </div>
                        <div class="piece">
                            <div class="card-header">pieces</div>
                            <div class="card-body" id="choix">
                                <div class="form-row justify-content-around">
                                    <div class="form-group col-md-2">
                                        <label for="chambre"><input class="form-check-input" type="checkbox"  id="Check1">chambre</label>
                                        <input type="number" class="form-control hide" id="chambre" name="chambre">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="salon"><input class="form-check-input" type="checkbox"  id="Check2">salon</label>
                                        <input type="number" class="form-control hide" id="salon" name="salon">
                                    </div>
                                </div>
                                <div class="form-row justify-content-around ">
                                    <div class="form-group col-md-2">
                                        <label for="bain"><input class="form-check-input" type="checkbox"  id="Check3">sale de bain</label>
                                        <input type="number" class="form-control hide" id="bain" name="bain">
                                    </div>
                                    <div class="form-group col-md-2" id="cuisine">
                                        <label for="cuisine"> <input class="form-check-input cuisine" type="checkbox"  >cuisine</label>
                                        <input type="number" class="form-control hide" id="inpputcuisine" name="cuisine">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="mt-5">
                                <a href="{{route('house.index')}}" class="btn bg-danger">retour</a>
                                <button type="submit" class="btn btn-primary">Enregistrer</button>
                            </div>
                        </div>
                     </form>
                </div>
            </div>
        </div>
@endsection

