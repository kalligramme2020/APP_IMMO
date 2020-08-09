@extends('layouts.app')
@section('content')
    <div id="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            modifier cette location
                            <div class="float-right ">
                                <a href="" class=" btn btn-outline-primary"></a>
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

                            <form action="{{ route('rental.update',$editloation) }} " method="POST" enctype="multipart/form-data">
                                @csrf
                                {{method_field('PUT')}}
                                <div class="card-header">bien louer</div>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-8" id="type">
                                            <label for="bienl">bien louer</label>
                                            <select class="form-control" id="bienl" name="bienlouer">
                                                <option selected> {{$editloation->locataire_id}} </option>
                                                @foreach($biens as $bien)
                                                    <option value="{{$bien->id}}">{{$bien->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-8" id="type">
                                            <label for="bienl">locataire</label>
                                            <select class="form-control" id="bienl" name="locataire_id">
                                                <option selected> {{$editloation->bien_id}}</option>
                                                @foreach($locataires as $locataire)
                                                    <option value="{{$locataire->id}}">{{$locataire->nom}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-header">detail de location</div>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="ident">identifiant</label>
                                            <input type="text" class="form-control" id="ident" name="identifiant">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="typeb">type du bail</label>
                                            <select class="form-control" id="typeb" name="typebail">
                                                <option value="" selected>{{$editloation->type_bail}} </option>
                                                <option value="bail d'habitation vide">bail d'habitation vide</option>
                                                <option value="bail d'habitation meuble">bail d'habitation meuble</option>
                                                <option value="bail commerciale">bail commerciale</option>
                                                <option value="bail de stokage">bail de stokage</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-11">
                                            <div class="form-check mb-4" >
                                                <input class="form-check-input" type="radio" name="residence1" id="principale" value="Résidence principale du locataire" >
                                                <label class="form-check-label" for="principale">
                                                    Résidence principale du locataire
                                                </label>
                                            </div>
                                            <div class="form-check mb-4" >
                                                <input class="form-check-input" type="radio" name="residence2" id="secondaire" value="Résidence secondaire du locataire">
                                                <label class="form-check-label" for="secondaire">
                                                    Résidence secondaire du locataire
                                                </label>
                                            </div>
                                            <div class="form-check mb-4">
                                                <input class="form-check-input act" type="checkbox">
                                                <label class="form-check-label" for="porActivite">
                                                    Le locataire est autorisé à exercer son activité professionnelle
                                                </label>
                                                <textarea name="activite" id="porActivite" class="form-control" placeholder="activité exercée dans les lieux louer"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="start">debut du bail</label>
                                            <input type="date" class="form-control" id="start" name="debutb" value="{{$editloation->debut_bail}}">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="end">fin du bail</label>
                                            <input type="date" class="form-control" id="end" name="finb" value="{{$editloation->fin_bail}}">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="long">durée du bail</label>
                                            <input type="text" class="form-control" id="long" name="dureeb" value="{{$editloation->duree_bail}}">
                                        </div>

                                    </div>
                                </div>

                                <div class="card-header">loyer</div>
                                <div class="card-body">
                                    <div class="">
                                        <div class="form-group col-md-6">
                                            <label for="hors">loyer hors charge</label>
                                            <input type="number" class="form-control" id="hors" name="loyerhc" placeholder="fcfa" value="{{$editloation->loyer_hc}}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="charge">charge</label>
                                            <input type="number" class="form-control" id="charge" name="charge" placeholder="fcfa" value="{{$editloation->charge}}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="avec">loyer avec charge</label>
                                            <input type="number" class="form-control" id="avec" name="loyerac" placeholder="fcfa" value="{{$editloation->loyer_ac}}">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="avec">date de paiement</label>
                                            <input type="number" class="form-control" id="avec" name="paiement_date" placeholder="fcfa" value="{{$editloation->payment_date}}">
                                        </div>

                                    </div>
                                </div>
                                <div class="card-header">depot de garantir</div>
                                <div class="card-body">
                                    <div class="form-group row ml-2" >
                                        <label for="garantir" class=" col-form-label">depot de grantir</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" id="garantir" name="garantir" placeholder="fcfa" value="{{$editloation->garantir}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="card-header proprio" type="button"> <i class="fa fa-chevron-down fa-lg" aria-hidden="true"> Travaux propriétaire </i></div>
                                <div class="card-body" id="proprio">
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="cout">Montant</label>
                                            <input type="number" class="form-control" id="cout" name="proprio" value="{{$editloation->montant_proprio}}">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label for="desc">description</label>
                                        <textarea class="form-control" id="desc" rows="3" name="proprioDescription">{{$editloation->activiter_proprio}}</textarea>
                                    </div>
                                </div>

                                <div class="card-header tenant" type="button"> <i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i> Travaux locataire </div>
                                <div class="card-body" id="tenant">
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="cout">Montant</label>
                                            <input type="number" class="form-control" id="cout" name="locataire" value="{{$editloation->montant_locataire}}">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-8">
                                        <label for="desc">description</label>
                                        <textarea class="form-control" id="desc" rows="3" name="locataireDescription">{{$editloation->activiter_locataire}}</textarea>
                                    </div>
                                </div>

                                <div class="card-header condition" type="button"> <i class="fa fa-chevron-down fa-lg" aria-hidden="true"></i> autres conditions </div>
                                <div class="card-body" id="condition">

                                    <div class="form-group col-md-8">
                                        <label for="desc">description</label>
                                        <textarea class="form-control" id="desc" rows="3" name="description">{{$editloation->activiter_locataire}}</textarea>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <div class="mt-5">
                                        <a href="{{route('rental.index')}}" class="btn bg-danger">retour</a>
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection



