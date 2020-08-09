@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class = "page-header text-center">
            <h4> Modifier ce bien</h4>
        </div>
        <div class="dropdown-divider"></div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-5">
                    <form action="{{ route('house.update',$editbien->id) }} " method="POST" enctype="multipart/form-data">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="card-header">Informations generales</div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="type">type du bien</label>
                                    <select class="form-control" id="type" name="typebien" >
                                        <option selected value="{{$editbien->tbien->id}}">{{$editbien->tbien->name}}</option>
                                        @foreach($tbiens as $tbien)
                                            <option value="{{$tbien->id}}">{{$tbien->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="prenon">Nom</label>
                                    <input type="text" class="form-control" id="prenon" name="name" value="{{$editbien->name}}">
                                </div>
                            </div>
                        </div>
                        <div class="card-header">Address</div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nom">addresse</label>
                                    <input type="text" class="form-control" id="nom" name="addresse" value=" {{$editbien->addresse}}  ">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="prenon">ville</label>
                                    <input type="text" class="form-control" id="prenon" name="ville" value="{{$editbien->ville}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="prenon">pays</label>
                                    <select class="form-control" id="type" name="pays">
                                        @if($editbien->countrie !== null)
                                        <option selected>{{$editbien->countrie->pays}}</option>
                                        @endif
                                        @foreach($pays as $pay)
                                            <option>{{$pay->pays}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="prenon">region</label>
                                    <input type="text" class="form-control" id="prenon" name="region" value="{{$editbien->region}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="prenon">surface M²</label>
                                    <input type="number" class="form-control" id="prenon" name="surface" value="{{$editbien->surface}}">
                                </div>

                                <div class="form-group col-md-8">
                                    <label for="desc">description</label>
                                    <textarea class="form-control" id="desc" rows="3"  name="description" >{{$editbien->description}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="card-header">photo</div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="nom">image</label>
                                    <input type="file" class="form-control" id="nom" name="file">
                                </div>
                                <div class="form-group col-md-6">
                                    <img src="{{ asset('profil/') }}/{{$editbien->photo}}" class="img-thumbnail" width="200">
                                </div>
                            </div>
                        </div>
                        <div class="">
                            @if($editbien->tbien->name === 'himeuble')
                                @foreach($editbien->pieces as $piece)
                               <div class="card-header">cas himeuble</div>
                               <div class="card-body">
                                   <div class="form-row">
                                       <div class="form-group col-md-3">
                                           <label for="type">Appartement</label>
                                           <input type="number" class="form-control" id="appt" name="appart" value="{{$piece->appartement}}">
                                       </div>
                                       <div class="form-group col-md-3">
                                           <label for="prenon">studio</label>
                                           <input type="number" class="form-control" id="studio" name="studio" value="{{$piece->studio}}">
                                       </div>
                                       <div class="form-group col-md-3">
                                           <label for="prenon">appartement meuble</label>
                                           <input type="number" class="form-control" id="prenon" name="meuble" value="{{$piece->appart_meuble}}">
                                       </div>
                                       <div class="form-group col-md-3">
                                           <label for="prenon">magasin</label>
                                           <input type="number" class="form-control" id="magasin" name="magasin" value="{{$piece->magasin}}">
                                       </div>
                                       <div class="form-group col-md-3">
                                           <label for="prenon">salle de banquet</label>
                                           <input type="number" class="form-control" id="salle" name="banquet" value="">
                                       </div>
                                   </div>
                               </div>
                           </div>
                            @endforeach
                        @endif
                        @if($editbien->tbien->name !== 'himeuble')
                        @foreach($editbien->pieces as $piece)
                        <div class="card-header">pieces</div>
                        <div class="card-body" id="choix">
                            <div class="form-row justify-content-around">
                                <div class="form-group col-md-2">
                                    <label for="chambre">chambre</label>
                                    <input type="number" class="form-control" id="chambre" name="chambre" value="{{$piece->chambre}}">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="salon">salon</label>
                                    <input type="number" class="form-control" id="salon" name="salon" value="{{$piece->salon}}">
                                </div>
                            </div>
                            <div class="form-row justify-content-around ">
                                <div class="form-group col-md-2">
                                    <label for="bain">sale de bain</label>
                                    <input type="number" class="form-control " id="bain" name="bain" value="{{$piece->salle_bain}}">
                                </div>
                                <div class="form-group col-md-2" id="cuisine">
                                    <label for="cuisine">cuisine</label>
                                    <input type="number" class="form-control" id="cuisine" name="cuisine" value="{{$piece->cuisine}}">
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
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

