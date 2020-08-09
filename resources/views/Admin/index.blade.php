@extends('layouts.master')

@section('content')
    <div class="">
        <div class="container-fluid ">

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Dashboard') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <h1>mdlkmdkgmkdmgkmdk</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
