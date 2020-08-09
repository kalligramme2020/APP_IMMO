@extends('layouts.app')
@section('content')
    <div id="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            Modifier un revenue
                        </div>
                    </div>
                </div>
            </div>


            <div class="row justify-content-center mt-5">
                <div class="col-md-8">
                    <form action="{{route('payment.update',$editinvoice )}}" method="POST">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="card">
                            <div class="card-header">reglement de loyer</div>
                            <div class="card-body mb-2">
                                <div class="form-row justify-content-center">
                                    <div class="col-md-8 mb-4 "> <label for="inputState">location lier</label>
                                        <select id="inputState" class="form-control" name="location">
                                            <option selected></option>
                                            @foreach($rentals as $rental)
                                                <option value="{{$rental->id}}">{{$rental->identifiant}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-2"> <label for="inputState">biens</label>
                                        <select id="inputState" class="form-control" name="bien">
                                            <option selected>{{$editinvoice->bien}}</option>
                                            @foreach($biens as $bien)
                                                <option value="{{$bien->name}}">{{$bien->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="inputState">locataire</label>
                                        <select id="inputState" class="form-control" name="locataire">
                                            <option selected>{{$editinvoice->locataire}}</option>
                                            @foreach($tenants as $tenant)
                                                <option value="{{$tenant->nom}}">{{$tenant->nom}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-2">
                                        <label for="debut">debut</label>
                                        <input type="date" class="form-control" id="debut" name="debut" value="{{$editinvoice->debut}}">
                                    </div>

                                    <div class="col-md-6 mb-2">
                                        <label for="fin">fin</label>
                                        <input type="date" class="form-control" id="fin" name="fin" value="{{$editinvoice->fin}}">
                                    </div>
                                </div>
                            </div>


                            <div class="card-header">montant</div>
                            <div class="card-body jus">
                                <div class="form-row justify-content-center">


                                    <div class="col-md-8 mb-2">
                                        <label for="avance">avance</label>
                                        <input type="number" class="form-control" id="avance" name="avance" value="{{$editinvoice->avance}}" placeholder="CFA ">
                                    </div>

                                    <div class="col-md-8 mb-2">
                                        <label for="reste">reste</label>
                                        <input type="number" class="form-control" id="reste" name="reste" value="{{$editinvoice->reste}}" placeholder="CFA">
                                    </div>

                                    <div class="col-md-8 mb-2">
                                        <label for="cout">total</label>
                                        <input type="number" class="form-control" id="cout" name="total" value="{{$editinvoice->total}}" placeholder="CFA ">
                                    </div>

                                    <div class="col-md-8 mb-2">
                                        <label for="desc">description</label>
                                        <textarea name="description" id="desc" class="form-control">{{$editinvoice->description}}</textarea>
                                    </div>

                                    <div class="col-md-8 mb-2">
                                        <label for="date">fait le:</label>
                                        <input type="date" class="form-control" id="date" name="date" value="{{$editinvoice->fait_le}}">
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-outline-primary float-right mr-5">enregistrer</button>
                                <a href="{{route('payment.index')}}" type="submit" class="btn btn-outline-danger float-right mr-3">retour</a>
                            </div>
                        </div>


                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

