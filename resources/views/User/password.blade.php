@extends('layouts.app')
@section('content')
    <div id="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-right ">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row justify-content-center mt-5">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">Changer son mots de passe</div>

                        <div class="panel-body">
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form class="form-horizontal" method="POST" action="{{ route('changePassword') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">

                                    <div class="col-md-8 ml-5 mt-4" >
                                        <input id="current-password" type="password" class="form-control" name="current-password" required placeholder="mots de passe actuel">

                                        @if ($errors->has('current-password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">

                                    <div class="col-md-8 mt-4 ml-5">
                                        <input id="new-password" type="password" class="form-control" name="new-password" required placeholder="nouveau de passe">

                                        @if ($errors->has('new-password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="col-md-8 mt-4 ml-5">
                                        <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required placeholder="confirmer">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4 mt-5 ml-5">
                                        <button type="submit" class="btn btn-primary">
                                            Appliquer
                                        </button>
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


