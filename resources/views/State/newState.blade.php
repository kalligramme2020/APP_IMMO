@extends('layouts.app')
@section('content')
    <div id="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            nouvel etat
                        </div>
                    </div>
                </div>
            </div>

            <form action="{{route('state.store')}}" method="POST"  enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center mt-5">
                    <div class="col-md-8">
                            <div class="card">
                                <div class="card-body mb-2">
                                    <div class="form-row justify-content-center">
                                        <div class="col-md-8 mb-4 "> <label for="inputState">location ou contrat lier</label>
                                            <select id="Location" class="form-control" name="location" >
                                                <option selected>Choose...</option>
                                                @foreach($locations as $location)
                                                <option value="{{$location->id}}">{{$location->identifiant}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-8 mb-2">
                                            <label for="desc">description</label>
                                            <textarea name="description" id="desc" class="form-control"></textarea>
                                        </div>

                                    </div>
                                </div>
                            </div>

                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="form-row ">
                                    <input type="file" id="files" name="filenames[]" multiple/>
                                </div>
                            </div>
                            <div class="card-body ">
                                <div id="image_preview">

                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-outline-primary float-right mr-5">enregistrer</button>
                                <a href="{{route('rental.index')}}" type="submit" class="btn btn-outline-danger float-right mr-3">retour</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection

