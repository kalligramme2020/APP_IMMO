@extends('layouts.app')
@section('content')
    <div id="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            images lier au differnts contrats de bail
                            <div class="float-right ">
                                <a href="{{route('state.create')}}" class=" btn btn-outline-primary">enregisterer un Etat de lieux</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row justify-content-center mt-5">
                <div class="col-md-11">
                    @foreach($states as $state)

                    <div class="card">
                        <div class="card-header">location concernée: <a href="" class="text-dark font-weight-bold" >{{$state->location->identifiant}}</a></div>
                        <div class="card-body">

                        </div>
                    </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
@endsection


