@extends('layouts.app')
@section('content')
<div id="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        This is some text within a card body.
                        <div class="float-right ">
                            <div class="dropdown">
                                <button class="btn btn-outline-secondary" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Nouvel transaction
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <a href="{{route('payment.create')}}" class="dropdown-item text-primary" type="button"><i class="fa fa-eur" aria-hidden="true"></i> ajouter un revenue</a>
                                    <button class="dropdown-item" type="button">Another action</button>
                                </div>
                            </div>
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
                        <table class="table table-bordered">
                            <thead class=" text-center">
                            <tr>
                                <th scope="col">bien</th>
                                <th scope="col">locataire</th>
                                <th scope="col">loyer</th>
                                <th scope="col">fait le</th>
                                <th scope="col">actions</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($payments as $payment)
                                <tr>
                                    <td>
                                        <a href="{{route('payment.show', $payment)}}" class="text-primary">{{$payment->bien}}</a>
                                    </td>
                                    <td>{{$payment->locataire}}</td>
                                    <td>{{$payment->total}}</td>
                                    <td>{{$payment->fait_le}}</td>
                                    <th class="text-center">
                                        <div class="btn-group">
                                            <button class="btn btn-secondary btn-sm " type="button" data-toggle="dropdown" aria-expanded="false">
                                                actions
                                            </button>
                                            <div class="dropdown-menu">
                                                <a href="{{route('payment.edit', $payment)}}" class="dropdown-item"><i class="fas fa-edit fa-sm"> </i> modifier</a>
                                                <a href="{{route('payment.index')}}" class="dropdown-item"> <i class="fa fa-eur" aria-hidden="true"></i> finances</a>
                                                <form
                                                    action="{{route('payment.destroy', $payment->id)}}"  method="POST" onsubmit="return confirm('Etes vous sur de cette action?');">
                                                    {{csrf_field()}}{{method_field('delete')}}
                                                    <button type="submit" class="dropdown-item"> <i class="fas fa-trash-alt fa-sm"></i> suprimer</button>
                                                </form>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Autres</a>
                                            </div>
                                        </div>
                                    </th>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection


